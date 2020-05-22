<?php include_once('functions/config.php'); ?>
<?php 
  if (isset($_POST['ajax'])){
    post_validation();
    exit;
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Krijoni blog</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/header-style.css">
    <link rel="stylesheet" href="./css/edit-profile-style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <?php include_once('./includes/navbar.php'); ?>
    <br>
    <div class="container">
    <div class="alert alert-danger text-center" id="error" style="visibility: hidden;"></div>
      <form class="form" method="post" id="newpost" enctype="multipart/form-data">
          <h1>Krijoni blog</h1>
          <label for="title">Titull:</label>
          <input type="text" class="form-control" id="title" name="title">
          <label for="description">Përshkrim:</label>
          <textarea id="description" name="description" rows="4" cols="50"></textarea><br><br>
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="image[]" id="image" accept=".jpg, .png, .jpeg">
            <label class="custom-file-label" for="images">Përzgjidh foto...</label>
          </div><br><br>
          <div class="row justify-content-center">
              <input type="button" class="btn btn-primary text-center" id="btn" value="Konfirmo"></button>
          </div>
          <br>
      </form>
    </div>


    <?php
    include_once('./includes/footer.php');
    ?>
</body>

</html>