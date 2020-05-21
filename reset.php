<?php include_once('functions/config.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>َPet&Us Reset</title>
    <link rel="stylesheet" href="css/style-login-register.css">
    
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </head>
    
    <br>
    <br>
    <div class="container">
        <?php 
                reset_password();
                display_message();
        ?>
        <div class="row align-items-center justify-content-center h-100">
            <div class="col-6 mx-auto">
                <form class="box" method="POST">
                    <h1>Vendosni fjalëkalimin e ri</h1>
                    <input type="password" name="reset-password" id="username" placeholder="Fjalëkalim">
                    <input type="password" name="creset-password" id="password" placeholder="Konfirmo Fjalëkalim">
                    <input type="hidden" name="token" value="<?php token_generator(); ?>">
                    <button id="btn btn-success float-right"> Dërgo </button> 
                </form>
            </div>
        </div>
    </div>

<?php require_once('includes/footer.php')?>

</body>
</html>