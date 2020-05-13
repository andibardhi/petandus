<?php include_once('functions/config.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title> Blog Pet&Us </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel = "stylesheet" type = "text/css" href = "./css/header-style.css">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link rel = "stylesheet" type = "text/css" href = "./css/homepage-style.css">
        <link rel = "stylesheet" type = "text/css" href = "./css/posts-style.css">
        <link rel = "stylesheet" type = "text/css" href = "./css/blogs-style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    
    <body style="background-color: #fff9e9;">
        <?php include_once('./includes/navbar.php'); ?>
        <br><br>
  
        <!-- blogs start -->
        <div class="container col-md-8">
            <div class="row justify-content-center">
            
                <a href="./single-post.php">    
                    <div class="row single-post">
                        <div class="row justify-content-around">
                            <div class="col-12">
                                <img src="./img/a.jpg" alt="post_photo" >
                            </div>

                            <h3> <title class="row">  Titull  </title> </h3>

                            <div class="col-12 description">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
                                an
                                unknown printer took a galley of type ...
                            </div>
                        </div>
                    </div>
                </a>

                <a href="./single-post.php">    
                    <div class="row single-post">
                        <div class="row justify-content-around">
                            <div class="col-12">
                                <img src="./img/a.jpg" alt="post_photo" >
                            </div>

                            <h3> <title class="row">  Titull  </title> </h3>
                            
                            <div class="col-12 description">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
                                an
                                unknown printer took a galley of type ...
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="./single-post.php">    
                    <div class="row single-post">
                        <div class="row justify-content-around">
                            <div class="col-12">
                                <img src="./img/b.jpg" alt="post_photo" >
                            </div>

                            <h3> <title class="row">  Titull  </title> </h3>
                            
                            <div class="col-12 description">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
                                an
                                unknown printer took a galley of type ...
                            </div>
                        </div>
                    </div>
                </a>

                <a href="./single-post.php">    
                    <div class="row single-post">
                        <div class="row justify-content-around">
                            <div class="col-12">
                                <img src="./img/c.jpg" alt="post_photo" >
                            </div>

                            <h3> <title class="row">  Titull  </title> </h3>
                            
                            <div class="col-12 description">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
                                an
                                unknown printer took a galley of type ...
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div> <!-- blogs end -->
        
        <br>

        <?php
            include_once('./includes/footer.php');
        ?>
    </body>
</html>

