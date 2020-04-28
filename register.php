<?php include_once('functions/config.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>َPet&Us Regjistrohu</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="css/style-login-register.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </head>
  <body>

    
    
<div class="container h-100">
    <?php register_validation(); ?>
    <div class="alert alert-danger text-center" id="error" style="visibility: hidden;"></div>
    <div class="row align-items-center justify-content-center h-100">
      <div class="col-6 mx-auto">
          <div id="box" class="box" autocomplete="on" >
              <h1>Regjistrohu</h1>
              <input type="text" name="firstname" id="firstname" placeholder="Emri">
              <input type="text" name="lastname" id="lastname" placeholder="Mbiemri">
              <input type="date" name="birthdate" id="birthdate" placeholder="Datëlindja">
              <input type="text" name="phonenumber" id="phonenumber" placeholder="Numer telefoni">
              <select id="city" name="city" >
                  <option value="null" selected disabled > Qyteti </option>
                  <option value="tirane">Tirane</option>
                  <option value="durres">Durres</option>
                  <option value="korce">Korce</option>
                  <option value="vlore">Vlore</option>
              </select>
              <input type="text" name="username" id="username" placeholder="Username">
              <input type="text" name="email" id="email"  placeholder="Email">
              <input type="password" name="password" id="password" placeholder="Fjalëkalimi">
              <input type="password" name="cpassword" id="cpassword" name="cpassword" placeholder="Konfirmim Fjalëkalimi">
              <button id="btn"> Regjistrohu </button> 
              <label> Have an account? <a href="./login.php">Login!</a> </label> 
          </div>
                </div>
            </div>
    </div>

    <script>
        $(document).ready(function () {
            $("#btn").click(function () {
                var firstname = $('#firstname').val();
                var lastname = $('#lastname').val();
                var birthdate = $('#birthdate').val();
                var phonenumber = $('#phonenumber').val();
                var city = $("#city option:selected").text();
                var email = $('#email').val();
                var username = $('#username').val();
                var password = $('#password').val();
                var cpassword = $('#cpassword').val();
                var max_char = 25;
                var min_char = 3;
                var errors = "";
                var count = 0;
                
                if(firstname.length > max_char){
                  errors+="<br>Ju lutem vendosni emrin me më pak se 25 gërma!";
                  count++;
                }
                if(firstname.length < min_char){
                  errors+="<br>Ju lutem vendosni emrin me më shumë se 2 gërma!";
                  count++;
                }
                if(lastname.length > max_char){
                  errors+="<br>Ju lutem vendosni mbiemrin me më pak se 25 gërma!";
                  count++;
                }
                if(lastname.length < min_char){
                  errors+="<br>Ju lutem vendosni mbiemrin me më shumë se 2 gërma!";
                  count++;
                }
                if(username.length > max_char){
                  errors+="<br>Ju lutem vendosni username me më pak se 25 gërma!";
                  count++;
                }
                if(username.length < min_char){
                  errors+="<br>Ju lutem vendosni username me më shumë se 2 gërma!";
                  count++;
                }
                if(password.length > max_char){
                  errors+="<br>Ju lutem vendosni fjalëkalimin me më pak se 25 karaktere!";
                  count++;
                }
                if(password.length < 6){
                  errors+="<br>Ju lutem vendosni fjalëkalimin me më shumë se 6 karaktere!";
                  count++;
                }
                if(password.localeCompare(cpassword) != 0 ){
                  errors+="<br>Fjalëkalimet nuk përshtaten!";
                  count++;
                }

                if(birthdate == ""){
                  errors+="<br>Vendosi datelindjen!";
                  count++;
                }

                if(phonenumber < 10){
                  errors+="<br>Vendosi nje numer telefoni te saktë!";
                  count++;
                }

                var emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                if(!emailRegex.test(email)){
                  errors+="<br>Email jo i saktë!";
                  count++;
                }



                if (firstname != "" && lastname != "" && birthdate != "" && phonenumber != "" && city != "" && email != "" && username != ""  && password != ""  && cpassword != "" && password==cpassword ) {
                    $.post('register.php', { firstname: firstname,lastname: lastname,birthdate: birthdate,phonenumber: phonenumber,city: city, username: username, password: password, cpassword: cpassword, email: email }, 
                     (data,response) => {
                        if(data.slice(0, 500).includes("success")){
                            window.location.href="login.php";
                        }
                        else{
                            if(data.slice(0, 500).includes('Username është në përdorim!')){
                              errors+="<br>Username është në përdorim!";
                              count++;
                            }
                            if(data.slice(0, 500).includes('Email-i është në përdorim!')){
                              errors+="<br>Email-i është në përdorim!";
                              count++;
                            }
                            count=count+50;
                            $('#error').html(errors.slice(4,errors.length));
                            $('#box').css("top",count.toString()+"%");
                            $('#error').css("visibility", "visible");
                        }
                    }
                    );
                }
                else{
                  count=(count*2)+48;
                  $('#error').html(errors.slice(4,errors.length));
                  $('#box').css("top",count.toString()+"%");
                  $('#error').css("visibility", "visible");
                }
            });
        });
    </script>


<?php require_once('includes/footer.php')?>