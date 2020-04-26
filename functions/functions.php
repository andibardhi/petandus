<?php
    //Clean string value
    function clean($string){
        return htmlentities($string);
    }

    //Redirect user to another page
    function redirect($location){
        return header("location:{$location}");
    }

    //Store message in session
    function set_message($msg){
        if(!empty(msg))
        {
            $_SESSION['info_msg']=$msg;
        }
    }

    //To display a message stored in session
    function display_message(){
        if(isset($_SESSION['info_msg'])){
            echo $_SESSION['info_msg'];
            unset($_SESSION['info_msg']);
        }
    }

    //Generating tokens
    function token_generator(){
        $token = $_SESSION['token']=md5(uniqid(mt_rand(), true));
        return $token;
    }

    /////////////////////////////////////////////////////////////////////
    //*------------------Register page functions----------------------*//
    /////////////////////////////////////////////////////////////////////
    //Validating user input data on register.php page
    function register_validation(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            //Variable for storing errors
            $errors = [];

            $firstname = clean($_POST['firstname']);
            $lastname = clean($_POST['lastname']);
            $birthdate = clean($_POST['birthdate']);
            $phonenumber = clean($_POST['phonenumber']);
            $city = (int)$_POST['city'];
            $username = clean($_POST['username']);
            $email = strtolower(clean($_POST['email']));
            $password = clean($_POST['password']);
            $cpassword = clean($_POST['cpassword']);

            $min_char = 03;
            $max_char = 25;

            if(strlen($firstname) > $max_char){
                $errors[] = "Ju lutem vendosni emrin me më pak se 25 gërma!";
            }

            if(strlen($firstname) < $min_char){
                $errors[] = "Ju lutem vendosni emrin me më shumë se 3 gërma!";
            }
            if(strlen($lastname) > $max_char){
                $errors[] = "Ju lutem vendosni mbiemrin me më pak se 25 gërma!";
            }

            if(strlen($lastname) < $min_char){
                $errors[] = "Ju lutem vendosni mbiemrin me më shumë se 3 gërma!";
            }

            if(strlen($username) > $max_char){
                $errors[] = "Ju lutem vendosni username me më pak se 25 karaktere!";
            }

            if(strlen($username) < $min_char){
                $errors[] = "Ju lutem vendosni username me më shumë se 3 karaktere!";
            }

            if(strlen($password) > $max_char){
                $errors[] = "Ju lutem vendosni username me më pak se 25 gërma!";
            }

            if(strlen($password) < 6){
                $errors[] = "Ju lutem vendosni fjalëkalim me më shumë se 6 karaktere!";
            }

            if($password != $cpassword){
                $errors[] = "Fjalëkalimet nuk përshtaten!";
            }

            if(!preg_match("/^[a-zA-Z,0-9]*$/", $username)){
                $errors[] = "Karaktere të pranueshem janë vetëm gërma dhe numra!";
            }else{
                if(username_exist($username)){
                    $errors[] = "Username është në përdorim!";
                }
            }
            
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors[] = "Email jo i saktë!";
            }else{
                if(email_exist($email)){
                    //We add it to errors array
                    $errors[] = "Email-i është në përdorim!";
                }
            }

            if(!empty($errors)){
                foreach($errors as $error){
                    echo '<div class="alert alert-danger">'.$error.'</div>';
                }
            }
            else{
                //We register the user because no error was found completing the form
                if(user_registration($username, $email, $password)){
                    //If registration succesful redirect the user
                    //echo('<p class="text-success text-center">U regjistruat me sukses.Kontrolloni email për aktivizim!</p>');
                    echo('<p class="text-success text-center">U regjistruat me sukses.</p>');
                }else{
                    echo('<p class="text-danger text-center">Ndodhi një gabim. Ju lutem provoni përsëri!/p>');  
                }
            }
        }
    }

    //Check if email exist
    function email_exist($email){
        //Prepare sql query
        $sql = " select * from user where email='$email'";
        //Get data
        $result = query($sql);
        if(fetch_data($result)){
            //Email exist in database
            return true;
        }else{
            return false;
        }
    }

    //Check if username exist
    function username_exist($username){
        //Prepare sql query
        $sql = " select * from user where username='$username' LIMIT 1";
        //Get data
        $result = query($sql);
        if(fetch_data($result)){
            //Username exist in database
            return true;
        }else{
            return false;
        }
    }

    //Registering the user in system
    function user_registration($username, $email, $password){
        $tmpUsername = Escape($username);
        $tmpEmail = Escape($email);
        $tmpPassword = Escape($password);

        $hashed_password = md5($tmpPassword);
        //$time = microtime();
        //$validation_code = md5($tmpUsername.$time);

        //$sql = "insert into user (username, email, password, validation_code) values ('$username', '$email', '$hashed_password', '$validation_code')";
        $sql = "insert into user (username, email, password) values ('$username', '$email', '$hashed_password')";
        $result = query($sql);
        confirm($result);
        
        set_message('<p class="text-success text-center">Regjistrimi përfundoi. Mund të kyçeni në sistem.</p>');
        redirect("login.php");
        //Send account activation email
        //send_activation_email($tmpEmail, $validation_code);

        return true;
    }

    //Sending email activation link to the user function
    function send_activation_email($to, $code)
    {
        $subject = "[Pet&Us] Mirëseerdhët në portalin dedikuar miqve tanë të vegjël!";
        $mail_body = "Për të aktivizuar llogarinë tuaj ju lutem shtypni link-un më poshtë! 
        http://localhost/petus/activate.php?email=$to&code=$code";
        $headers = "From: funcszone@gmail.com \r\n";
        $headers .= "MIME-Version: 1.0"."\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";
        return mail($to, $subject, $mail_body, $headers);
    }

    ///////////////////////////////////////////////////////////////////////
    //*------------------Activation page functions----------------------*//
    ///////////////////////////////////////////////////////////////////////
    //Activation function
    function activation(){
        if($_SERVER['REQUEST_METHOD']=="GET"){
            $email = $_GET['email'];
            $code = $_GET['code'];

            $sql = "select * from user where email='$email' AND validation_code ='$code'";
            $result = query($sql);
            confirm($result);

            if(fetch_data($result)){
                $sqlupdate = "update user set active='1', validation_code='' where email='$email' AND validation_code='$code'";
                $res_update = query($sqlupdate);
                confirm($res_update);
                set_message('<p class="text-success text-center">Regjistrimi përfundoi. Mund të kyçeni në sistem.</p>');
                redirect('login.php');
            }else{
                echo ('<p class="text-danger text-center">GABIM!</p>');
            }
        }
    }
    
    ///////////////////////////////////////////////////////////////////////
    //*------------------Login form functions----------------------*//
    ///////////////////////////////////////////////////////////////////////
    //Login form user input validation
    function login_validation(){
        $errors = [];
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $username = clean($_POST['username']);
            $password = clean($_POST['password']);
            $remember_me = isset($_POST['remember']);
            if(empty($username))
            {
                $errors[] = "Ju lutem vendosni username tuaj!";
            }else if(strlen($username) < 3){
                $errors[] = "Ju lutem vendosni username me më shumë se 3 karaktere!";
            }

            if(empty($password))
            {
                $errors[] = "Ju lutem vendosni fjalëkalimin!";
            }else if(strlen($password) < 6){
                $errors[] = "Ju lutem vendosni fjalëkalim me më shumë se 6 karaktere!"; 
            }

            if(!empty($errors)){
                foreach($errors as $error){
                    echo '<div class="alert alert-danger">'.$error.'</div>';
                }
            }else{
                if(user_login($username, $password, $remember_me)){
                    redirect('index.php');
                }else{
                    echo '<div class="alert alert-danger">Username ose fjalëkalim i gabuar.</div>';
                }
            }

        }
    }

    function user_login($username, $password, $remember_me){
        $sql = "select * from user where username='$username' AND active='1'";
        $result = query($sql);

        if($row=fetch_data($result)){
            //We get the record from database because we need to compare passwords
            $record_pass = $row['password'];
            if(md5($password) == $record_pass){
                if($remember_me == true){
                    //We store the cookie for 1 day
                    setcookie('username', $username, time() + 86400);
                }
                $_SESSION['username'] = $username;
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    //Is logged in function to check if user is logged in
    function is_user_logged_in(){
        if(isset($_SESSION['username']) || isset($_COOKIE['username'])){
            return true;
        }else{
            return false;
        }
    }

     ///////////////////////////////////////////////////////////////////////
    //*------------------Recover form functions----------------------*//
    ///////////////////////////////////////////////////////////////////////




?>
