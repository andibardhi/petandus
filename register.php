<?php include_once('functions/config.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>َPet&Us Regjistrohu</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="css/style-login-register.css">
  </head>
  <body>

    
    
<div class="container">
    <?php register_validation(); ?>
    <form class="box" method="post" autocomplete="on">
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
        <input type="text" name="username" id="Username" placeholder="Username">
        <input type="text" name="email" id="email"  placeholder="Email">
        <input type="password" name="password" id="password" placeholder="Fjalëkalimi">
        <input type="password" name="cpassword" name="cpassword" placeholder="Konfirmim Fjalëkalimi">
        <button id="btn"> Regjistrohu </button> 
        <label> Have an account? <a href="./login.html">Login!</a> </label> 
    </form>
    </div>


<?php require_once('includes/footer.php')?>