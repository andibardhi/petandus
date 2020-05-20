<?php include_once('functions/config.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Pet&Us Single Blog</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/header-style.css">
    <link rel="stylesheet" href="./css/single-post-style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <?php include_once('./includes/navbar.php');?>
    <br>

    <div class='container'>
            
            <div class='row justify-content-center title'>
                <span> Titulli </span>
            </div>
            <div class='row description'>
                <span> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged."</span>
            </div>
            <div class='row justify-content-center'>
                <img src="./img/b.jpg" alt='post_photo'>
            </div>
            <div class='row categories'>
                <div class='col-4 category'> Kategoria </div>
                <div class='col-4 city'> Qyteti </div>
                <div class='col-4 animal'> Kafsha </div>
            </div>
        </div>

    <?php include_once('./includes/footer.php'); ?>
</body>

</html>