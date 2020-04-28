<?php include_once('functions/config.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>َPet&Us Rikthe fjalëkalimin</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    
    <link rel="stylesheet" href="css/style-login-register.css">
  </head>
  <body>
  <div class="container h-100">
  <div class="row align-items-center justify-content-center h-100" style="margin-top:100px">
    <div class="col-6 mx-auto">
    <form class="box"  method="post">
        <h1>Rikthe fjalëkalimin</h1>
        <?php 
          recover_password(); 
          display_message();
        ?>
        <form method="POST">
          <label> Shkruani emailin tuaj </label>
          <input type="email" id="email" name="email" placeholder="Email" /> 
          <input type="hidden" name="token" value="<?php echo token_generator(); ?>"/> 
          <button id="btn"> Dërgo fjalëkalim </button>
        </form>
    </form>
    </div>
    </div>
    </div>


<?php require_once('includes/footer.php')?>
