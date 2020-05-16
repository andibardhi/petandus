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
        if(!empty($msg))
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
            $city = clean($_POST['city']);
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
                if(user_registration($firstname, $lastname, $birthdate, $phonenumber, $city, $username, $email, $password)){
                    //If registration succesful redirect the user
                    //echo('<p class="text-success text-center">U regjistruat me sukses.Kontrolloni email për aktivizim!</p>');
                    // echo('<p class="text-success text-center">U regjistruat me sukses.</p>');
                    set_message('<p class="text-success text-center">Regjistrimi përfundoi. Mund të kyçeni në sistem.</p>');
                    redirect("login.php");
                }else{
                    echo('<p class="text-danger text-center">Ndodhi një gabim. Ju lutem provoni përsëri!/p>');  
                }
            }
        }
    }

    //Check if email exist
    function email_exist($email){
        //Prepare sql query
        $sql = " select * from User where email='$email'";
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
        $sql = " select * from User where username='$username' LIMIT 1";
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
    function user_registration($firstname, $lastname, $birthdate, $phonenumber, $city, $username, $email, $password){
        $tmpFirstname = Escape($firstname);
        $tmpLastname = Escape($lastname);
        $tmpUsername = Escape($username);
        $tmpEmail = Escape($email);
        $tmpPassword = Escape($password);
        $hashed_password = md5($tmpPassword);
        //$time = microtime();
        //$validation_code = md5($tmpUsername.$time);

        global $connect;
        $sql = "insert into User (username, email, password) values ('$tmpUsername', '$tmpEmail', '$hashed_password')";
        if(mysqli_query($connect, $sql)){
            //Ruaj id e shtuar se fundmi ne tabelen e user-ave ne databaze
            $last_id = mysqli_insert_id($connect);
            
            $birthyear = (int)substr($birthdate, 0, 4);
            $year = (int)(new DateTime)->format("Y");
            $age = $year - $birthyear;

            //Me pas bej shtimin e rekordit ne tabelen e profilit
            $sql2 = "insert into Profil (userId, emer, mbiemer, mosha, nrtel, qyteti) values ('$last_id', '$tmpFirstname', '$tmpLastname', '$age', '$phonenumber', '$city')";
            if(mysqli_query($connect, $sql2)){
                return true;
            }else{
                return false;
            }
        } 
        else {
            //Ndodh error
            return false;
        }
        //Send account activation email
        //send_activation_email($tmpEmail, $validation_code);
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

            $sql = "select * from User where email='$email' AND validation_code ='$code'";
            $result = query($sql);
            confirm($result);

            if(fetch_data($result)){
                $sqlupdate = "update User set active='1', validation_code='' where email='$email' AND validation_code='$code'";
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
                    // redirect('index.php');
                    echo 'success';
                }else{
                    echo '<div class="alert alert-danger">Username ose fjalëkalim i gabuar.</div>';
                }
            }

        }
    }

    function user_login($username, $password, $remember_me){
        $sql = "select * from User where username='$username' AND active='1'";
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
    function recover_password(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_SESSION['token']) && $_POST['token'] == $_SESSION['token']){
                $email = $_POST['email'];

                if(email_exist($email)){
                    $code = md5($email.microtime());
                    setcookie("temp_code", $code, time()+3600);

                    $sql = "update User set validation_code='$code' where email='$email' and active = '1'";
                    query($sql);
                    
                    $subject = "Rikthim fjalëkalimi";
                    $message = "Klikoni link-un e mëposhtëm për të rikthyer fjalëkalimin tuaj. 
                                http://localhost/petus/reset.php?email=$email&code=$code";
                    $header = "From: petusteam@gmail.com";

                    if(mail($email, $subject, $message, $header)){
                        echo '<div class="alert">U dërgua link për rikthim fjalëkalim.</div>';
                    }else{
                        echo '<div class="alert">Ndodhi një gabim!</div>';
                    }

                }else{
                    echo '<div class="alert alert-danger">Email i gabuar.</div>';
                }
            }
        }
    }

    ///////////////////////////////////////////////////////////////////////
    //*------------------Reset form functions----------------------*//
    ///////////////////////////////////////////////////////////////////////
    function reset_password(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){

        
        if(isset($_COOKIE['temp_code'])){
            if(isset($_GET['email']) && isset($_GET['code'])){
                if($_POST['reset-password']  === $_POST['creset-password']){
                    $em = $_GET['email'];
                    $pass = md5($_POST['reset-password']);
                    
                    $sql = "update User set password='$pass', validation_code='' where email='$em'";
                    $result = query($sql);

                    if($result){
                        set_message('<p class="alert alert-success">Fjalëkalimi u ndryshua me sukses!</p>');
                        redirect('login.php');
                    }else{
                        set_message('<div class="alert">Ndodhi një gabim!</div>');
                    }

                }else{
                    set_message('<div class="alert">Fjalëkalimet nuk përputhen!</div>');
                }
            }else{
                redirect('index.php');
            }
        }else{
            set_message('<div class="alert">Kjo kërkese nuk është më e vlefshme!</div>');
        }
    }
}

    /////////////////////////////////////////////////////////////////////
    //*------------------New post page functions----------------------*//
    /////////////////////////////////////////////////////////////////////
    
    function post_validation(){

        if (!isset($_SESSION['username'])){
            set_message('postim anonim');
            redirect('register.php');
        }else{
            if($_SERVER['REQUEST_METHOD']=='POST'){
                //Variable for storing errors
                $errors = [];
                
                $username = $_SESSION['username'];
                $title = clean($_POST['title']);
                $description = clean($_POST['description']);
                $phonenumber = clean($_POST['phonenumber']);
                $city = clean($_POST['city']);
                $email = strtolower(clean($_POST['email']));
                $animal = clean($_POST['animal']);
                $category = clean($_POST['category']);
    
                date_default_timezone_set("Europe/Tirane");
                $time = date("Y-m-d H:i:s");
    
                $min_char = 05;
                $max_char = 30;
                $desc_min_char = 005;
                $desc_max_char = 200;
                $count = 0;
    
                if(strlen($title) > $max_char){
                    $errors[] = "Ju lutem vendosni titullin me më pak se 30 gërma!";
                }
    
                if(strlen($title) < $min_char){
                    $errors[] = "Ju lutem vendosni titullin me më shumë se 5 gërma!";
                }
    
                if(strlen($description) > $desc_max_char){
                    $errors[] = "Ju lutem vendosni përshkrimin me më pak se 250 gërma!";
                }
    
                if(strlen($description) < $desc_min_char){
                    $errors[] = "Ju lutem vendosni përshkrimin me më shumë se 5 gërma!";
                }

                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $errors[] = "Email jo i saktë!";
                }
                
                if(!empty($errors)){
                    foreach($errors as $error){
                        echo '<div class="alert alert-danger">'. $error .'</div>';
                    }
                }else{
                    // Post registration
                    if(create_post($username, $title, $description, $phonenumber, $email, $city, $animal, $category, $time)){
                        sleep(3);
                        redirect('posts.php');
                    }else{
                    }
                }
            }
        }
    }

    function create_post($username, $title, $description, $phonenumber, $email, $city, $animal, $category, $time){
        
        $all_id = get_allID($username, $city, $animal, $category);

        $userID = $all_id['userID'];
        $cityID = $all_id['cityID'];
        $animalID = $all_id['animalID'];
        $categoryID = $all_id['categoryID'];

        $sql = "insert into Post (titull, pershkrim, data, autorID, kategoriID, kafshaID, qytetiID, nrtel, email) values ('". $title. "','" . $description . "','" . $time . "','" . $userID . "','" . $categoryID . "','" . $animalID . "','" . $cityID . "','" . $phonenumber . "','" . $email . "')";
        $result = query($sql);
        confirm($result);

        $postID = getpostID($userID, $time);
        
        save_photo($postID);

        return true;
    }

    function get_allID($username, $city, $animal, $category){
        
        // UserID
        $sql = "select id from User where username='" . $username . "'";
        $result = query($sql);
        confirm($result);
        $row = fetch_data($result);
        $userID = $row['id'];

        // CityID

        $sql = "select id from Qytet where emer='" . $city . "'";
        $result = query($sql);
        confirm($result);
        $row = fetch_data($result);
        $cityID = $row['id'];

        // AnimalID

        $sql = "select id from Kafshe where emer='" . $animal . "'";
        $result = query($sql);
        confirm($result);
        $row = fetch_data($result);
        $animalID = $row['id'];

        // CategoryID

        $sql = "select id from Kategori where emer='" . $category . "'";
        $result = query($sql);
        confirm($result);
        $row = fetch_data($result);
        $categoryID = $row['id'];

        return array('userID'=>$userID, 'cityID'=>$cityID, 'animalID'=>$animalID, 'categoryID'=>$categoryID);
    }

    function save_photo($postID){

        $image_file = addslashes(file_get_contents($_FILES["image"]["tmp_name"][0]));
        $sql = "update Post set foto='" . $image_file . "' where id='" . $postID . "'";
        $result = query($sql);
        confirm($result);
    }

    function getpostID($userID, $time){

        $sql = "select id from Post where autorID='" . $userID . "' and data='" . $time . "'";
        $result = query($sql);
        confirm($result);
        $row = fetch_data($result);
        $postID = $row['id'];

        return $postID;
    }

    /////////////////////////////////////////////////////////////////////
    //*------------------Posts page functions----------------------*//
    ////////////////////////////////////////////////////////////////////    

    function generate_post($filter){

        if ($filter == 1){
            $data = filtering_data();
            $imgs = filtering_photo();    
        }else{
            $data = retrieve_data(6);
            $imgs = retrieve_photo(6);
        }

        for($i = 0; $i < count($data); $i++){

            $id = $data[$i][0];
            $title = $data[$i][1];
            $desc = $data[$i][2];
            $img = $imgs[$i];
            $date = substr($data[$i][3], 0, 10);
            $user = $data[$i][4];
            $ctgr = $data[$i][5];
            $anim = $data[$i][6];
            $city = $data[$i][7];

            $info = $date . " | " . $user . " | " . $ctgr . " | " . $anim . " | " . $city;

            echo "
            <a href='./single-post.php?id=" . $id . "' id='post'>      
                <div class='row single-post'>
                    <title class='row' id='title'>" . $title . "</title>
                    <div class='row justify-content-around'>
                        <div class='col-5 img'>
                            <img src='data:image/jpeg;base64, " . $img . "' alt='post_photo'>
                        </div>
                        <div class='col-7 description'>
                            <span id='desc'>" . $desc . "</span>
                        </div>
                        <div class='row info'>
                        <span id='info'>" . $info . "</span>
                        </div>
                    </div>
                </div>
            </a>
            ";
        }

    }

    function getUserName($uid){
        $sql = "SELECT username from User WHERE id='" . $uid . "'";
        $result = query($sql);
        confirm($result);
        $row = fetch_data($result);

        return $row['username'];
    }

    function getCityName($cityid){
        $sql = "SELECT emer from Qytet WHERE id='" . $cityid . "'";
        $result = query($sql);
        confirm($result);
        $row = fetch_data($result);

        return $row['emer'];
    }

    function getCategoryName($ctid){
        $sql = "SELECT emer from Kategori WHERE id='" . $ctid . "'";
        $result = query($sql);
        confirm($result);
        $row = fetch_data($result);

        return $row['emer'];
    }

    function getAnimalName($anid){
        $sql = "SELECT emer from Kafshe WHERE id='" . $anid . "'";
        $result = query($sql);
        confirm($result);
        $row = fetch_data($result);

        return $row['emer'];
    }

    function retrieve_data($nr){

        $sql = "SELECT id, titull, pershkrim, data, autorID, kategoriID, kafshaID, qytetiID, nrtel, email FROM Post ORDER BY id DESC LIMIT " . $nr;

        $result = query($sql);

        confirm($result);

        $row = mysqli_fetch_all($result);
        
        for ($i = 0; $i < row_count($result); $i++){
            $usname = getUserName($row[$i][4]);
            $cgname = getCategoryName($row[$i][5]);
            $anname = getAnimalName($row[$i][6]);
            $ctname = getCityName($row[$i][7]);
            $row[$i][4] = $usname;
            $row[$i][5] = $cgname;
            $row[$i][6] = $anname;
            $row[$i][7] = $ctname;
        }

        return $row;
    }

    function retrieve_photo($nr){
        
        $sql = "SELECT foto FROM Post ORDER BY id DESC LIMIT " . $nr;

        $result = query($sql);

        confirm($result);

        $imgs = array();

        while($d = mysqli_fetch_row($result)){
            array_push($imgs, base64_encode($d[0]));
        }

        return $imgs;
    }

    function filtering_data(){

        if (!empty($_GET)) {
            $sql1 = "SELECT id, titull, pershkrim, data, autorID, kategoriID, kafshaID, qytetiID, nrtel, email FROM Post ";
            $sql2 = " ORDER BY id DESC LIMIT 5";

            $sql1 = getfiltersID($sql1);

            $result = query($sql1.$sql2);
            
            confirm($result);

            $row = mysqli_fetch_all($result);
            
            for ($i = 0; $i < row_count($result); $i++){
                $usname = getUserName($row[$i][4]);
                $cgname = getCategoryName($row[$i][5]);
                $anname = getAnimalName($row[$i][6]);
                $ctname = getCityName($row[$i][7]);
                $row[$i][4] = $usname;
                $row[$i][5] = $cgname;
                $row[$i][6] = $anname;
                $row[$i][7] = $ctname;
            }

            return $row;
        }
    }

    function filtering_photo(){

        $sql1 = "SELECT foto FROM Post";
        $sql2 = " ORDER BY id DESC LIMIT 5";

        $sql1 = getfiltersID($sql1);

        $result = query($sql1.$sql2);

        confirm($result);

        $imgs = array();
        while($d = mysqli_fetch_row($result)){
            array_push($imgs, base64_encode($d[0]));
        }

        return $imgs;
    }

    function getfiltersID($sql1){

        if(!empty($_GET)){
            $sql1 .= " WHERE ";
        }

        if (isset($_GET['city'])) {

            $res = query("SELECT id FROM Qytet WHERE emer='". $_GET['city'] . "'");
            $city = mysqli_fetch_assoc($res);
            $sql1 .= " qytetiId='" . $city['id'] . "'";
        }
        if (isset($_GET['animal'])) {
            if(isset($_GET['city'])){
                $sql1 .= " and ";
            }

            $res = query("SELECT id FROM Kafshe WHERE emer='". $_GET['animal']."'");
            $animal = mysqli_fetch_assoc($res);
            $sql1 .= " kafshaId='" . $animal['id'] . "'";
            
        }
        if (isset($_GET['category'])) {
            if (isset($_GET['animal']) || isset($_GET['city'])){
                $sql1 .= " and ";
            }

            $res = query("SELECT id FROM Kategori WHERE emer='". $_GET['category']."'");
            $category = mysqli_fetch_assoc($res);
            $sql1 .= " kategoriId='" . $category['id'] . "'";
        }
        
        return $sql1;
    }

    /////////////////////////////////////////////////////////////////////
    //*-------------- Single post page functions-------------------*//
    ////////////////////////////////////////////////////////////////////

    function build_single_post($id){

        $data = get_data_byID($id);
        $img = get_photo_byID($id);

        $id = $data[0][0];
        $title = $data[0][1];
        $desc = $data[0][2];
        $image = $img[0];
        $date = substr($data[0][3], 0, 10);
        $user = $data[0][4];
        $ctgr = $data[0][5];
        $anim = $data[0][6];
        $city = $data[0][7];
        $tel = $data[0][8];
        $email = $data[0][9];
        
        echo "
            <div class='container'>
            <div class='row justify-content-center'>
                <img src='data:image/jpeg;base64, " . $image . "' alt='post_photo'>
            </div>
            <div class='row justify-content-center title'>
                <span>" . $title . "</span>
            </div>
            <div class='row description'>
                <span>" . $desc . "</span>
            </div>
            <div class='row email'>
            Email:&nbsp;<a href='mailto:email@example.com'>" . $email . "</a>
            </div>
            <div class='row phone'>
             <span>" . $tel . "</span>
            </div>
            <div class='row categories'>
                <div class='col-4 category'>" . $ctgr . "</div>
                <div class='col-4 city'>" . $city . "</div>
                <div class='col-4 animal'>" . $anim ."</div>
            </div>
        </div>
        ";

    }

    function get_data_byID($id){

        $sql = "SELECT id, titull, pershkrim, data, autorID, kategoriID, kafshaID, qytetiID, nrtel, email FROM Post WHERE id=" . $id;

        $result = query($sql);

        confirm($result);

        $row = mysqli_fetch_all($result);
        
        for ($i = 0; $i < row_count($result); $i++){
            $usname = getUserName($row[$i][4]);
            $cgname = getCategoryName($row[$i][5]);
            $anname = getAnimalName($row[$i][6]);
            $ctname = getCityName($row[$i][7]);
            $row[$i][4] = $usname;
            $row[$i][5] = $cgname;
            $row[$i][6] = $anname;
            $row[$i][7] = $ctname;
        }

        return $row;
    }

    function get_photo_byID($id){
        
        $sql = "SELECT foto FROM Post WHERE id=" . $id;

        $result = query($sql);

        confirm($result);

        $img = array();

        while($d = mysqli_fetch_row($result)){
            array_push($img, base64_encode($d[0]));
        }

        return $img;
    }

?>
