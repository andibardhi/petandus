<?php include_once('functions/config.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>َPet&Us Login</title>
    <link rel="stylesheet" href="css/style-login-register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </head>
  <body>
    <div class="container">
        <?php 
                display_message();
                login_validation();
        ?>
        <div class="alert alert-danger text-center" id="error" style="visibility: hidden;"></div>
        <div class="row align-items-center justify-content-center h-100">
        <div class="col-6 mx-auto">
        <div class="box" >
            <h1>Login</h1>
            <input type="text" name="username" id="username" placeholder="Username">
            <div class="reveal-password">
                <input type="password" name="password" id="password" placeholder="Fjalëkalim"><i style="font-size:24px;cursor: pointer;" onclick="togglePassword()" class="fa">&#xf06e;</i>
            </div>
            <input type="checkbox" name="remember" id="remember"> <label for="remember">Më mbaj mend</label><br>
            <a href="./recover.php">Keni harruar fjalëkalimin?</a> 
            <button id="btn"> LOGIN </button> 
            <label> Nuk keni nje llogari? <a href="./register.php">Regjistrohuni!</a> </label>
        </div>
        </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $("#btn").click(function () {
                var un = $('#username').val();
                var pass = $('#password').val();
                var remember = $("#remember").is(":checked");
                if (un != "" && pass != "") {
                    $.post('login.php', { username: un, password: pass,remember: remember}, 
                     (data,response) => {
                        if(data.slice(0, 600).includes("success")){
                            window.location.href="index.php";
                        }
                        else{
                            $('#error').css("visibility", "visible");
                            $('#error').html("Username ose fjalëkalim i gabuar.");
                        }
                    }
                    );
                }
                else{
                    $('#error').css("visibility", "visible");
                    $('#error').html("Ploteso fushat bosh.");
                }
            });
        });

        function togglePassword(){
            if($("#password").attr("type")=='password'){
                $("#password").attr("type","text");
            }
            else{
                $("#password").attr("type","password");
            }
        }
    </script>

<?php require_once('includes/footer.php')?>