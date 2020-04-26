<?php include_once('functions/config.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>َPet&Us Login</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="css/style-login-register.css">
  </head>
  <body>

    <div class="container">
        <div>
            <?php 
                display_message();
                login_validation();
            ?>
        </div>
        <form class="box" method="post">
            <h1>Login</h1>
            <input type="text" name="username" id="username" placeholder="Username">
            <input type="password" name="password" id="password" placeholder="Fjalëkalim">
            <input type="checkbox" name="remember"> <label for="remember">Më mbaj mend</label><br>
            <a href="./recover.php">Keni harruar fjalëkalimin?</a> 
            <button id="btn"> LOGIN </button> 
            <label> Nuk keni nje llogari? <a href="./register.php">Regjistrohuni!</a> </label>
            
        </form>
    </div>

<?php require_once('includes/footer.php')?>