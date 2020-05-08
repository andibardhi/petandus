<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Krijoni post</title>
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
    <?php
    include_once('./includes/navbar.php');
    ?>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <img src="./img/profile-dog.jpg">         
        </div>
        <div class="row justify-content-center title">
            Titull       
        </div>
        <div class="row description">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.     
        </div>
        <div class="row email">
        Email:&nbsp;<a href="mailto:email@example.com"> email@example.com</a>
        </div>
        <div class="row phone">
        Nr tel: 068XXXXXXX
        </div>
        <div class="row categories">
            <div class="col-4 category">#Adoptim</div>
            <div class="col-4 city">#Tirane</div>
            <div class="col-4 animal">#Qen</div>
        </div>
    </div>
    <?php
    include_once('./includes/footer.php');
    ?>
</body>

</html>