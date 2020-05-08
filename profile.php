<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Profile</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/profile-style.css">
    <link rel="stylesheet" href="./css/header-style.css">
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
        <div class="row justify-content-around" id="main">
            <div class="col-md-3">
                <div class="row justify-content-center">
                    <img class="rounded-circle profile-picture" src="./img/profile-picture.jpg" height="150" width="150">
                </div>
                <div class="row justify-content-center">
                    <h4 class="text-center">Emer Mbiemer</h4>
                </div>
                <br>
                <div class="row justify-content-center">
                    <div class="col personal-info">
                        <div class="row justify-content-center">
                            <a href="./edit-profile.php" class="fa fa-edit edit-icon" style="text-decoration: none;"></a>
                            <h6 class="text-center">Te dhenat personale</h6>
                        </div>
                        <div class="row">
                            <ul>
                                <li>@emermbiemer</li>
                                <li>30 vjec</li>
                                <li>+355 68 XXXXXXX</li>
                                <li>Tirane</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
            
                <div class="row justify-content-center">
                <a href="./new-post.php"> <button type="button" class="btn create-post"> <i class="fa fa-plus-circle"></i> Krijo post</button> </a>
                    <a href="./single-post.php"> 
                        <div class="row single-post">
                            <title class="row">Titull</title>
                            <div class="row justify-content-around">
                                <div class="col-7 description">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
                                    an
                                    unknown printer took a galley of type ...
                                </div>
                                <div class="col-5">
                                    <img src="./img/profile-dog.jpg">
                                </div>
                            </div>
                            <div class="row">
                                <a href="./edit-post.php">
                                
                                    <button class="btn edit-post">  Modifiko postin </button>
                                </a>
                            </div>
                        </div>
                    </a>
                    <a href="./single-post.php"> 
                        <div class="row single-post">
                            <title class="row">Titull</title>
                            <div class="row justify-content-around">
                                <div class="col-7 description">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
                                    an
                                    unknown printer took a galley of type ...
                                </div>
                                <div class="col-5">
                                    <img src="./img/profile-cat.jpg">
                                </div>
                            </div>
                            <div class="row">
                            <a href="./edit-post.php">
                                    <button class="btn edit-post"> Modifiko postin </button>
                                </a>
                            </div>
                        </div>
                    </a>
                    <a href="./single-post.php"> 
                        <div class="row single-post">
                            <title class="row">Titull</title>
                            <div class="row justify-content-around">
                                <div class="col-7 description">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
                                    an
                                    unknown printer took a galley of type ...
                                </div>
                                <div class="col-5">
                                    <img src="./img/profile-fish.jpg">
                                </div>
                            </div>
                            <div class="row">
                            <a href="./edit-post.php">
                                    <button class="btn edit-post"> Modifiko postin </button>
                                </a>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>
    <?php
    include_once('./includes/footer.php');
    ?>
</body>

</html>