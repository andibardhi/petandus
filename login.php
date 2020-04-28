<?php include_once('functions/config.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>َPet&Us Login</title>
    <link rel="stylesheet" href="css/style-login-register.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </head>
  <body>
    <div class="container">
        <?php 
                display_message();
                login_validation();
        ?>
        <div class="alert alert-danger text-center" id="error" style="visibility: hidden;">
        Username ose fjalëkalim i gabuar.
        
        </div>
        <div class="box" >
            <h1>Login</h1>
            <input type="text" name="username" id="username" placeholder="Username">
            <input type="password" name="password" id="password" placeholder="Fjalëkalim">
            <input type="checkbox" name="remember" id="remember"> <label for="remember">Më mbaj mend</label><br>
            <a href="./recover.php">Keni harruar fjalëkalimin?</a> 
            <button id="btn"> LOGIN </button> 
            <label> Nuk keni nje llogari? <a href="./register.php">Regjistrohuni!</a> </label>
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
                        if(data.slice(0, 500).includes("success")){
                            window.location.href="index.php";
                        }
                        else{
                            $('#error').css("visibility", "visible");
                        }
                    }
                    );
                }
                else{
                    alert('Ploteso fushat bosh');
                }
            });
        });
    </script>

<?php require_once('includes/footer.php')?>