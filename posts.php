<?php include_once('functions/config.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title> Posts Pet&Us </title>
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    
    <body style="background-color: #fff9e9;">
        <?php include_once('./includes/navbar.php'); ?>
        <br><br>
        <!-- filer start -->
        <div class="container col-md-8" style="padding: 0px;">
            <form method="get"> 
                <a href="./new-post.php" > <button type="button" class="btn" id="btncolor" style="background-color:#e45225; border-radius: 50px;  padding: 13px 15px; color: white"> <i class="fa fa-pencil" style="font-size:27px"></i> </button> </a>
            <span class="txtformat" style="padding-left:150px;"> Shto filter: </span> 
            <div class="btn-group">
                <select id="btncolor" name="animal" id="animal">
                    <option value="null" selected disabled style=" display: none;">Kafsha</option>
                    <option value="qen">Qen</option>
                    <option value="mace">Mace</option>
                    <option value="peshk">Peshk</option>
                </select>
            </div>

            <div class="btn-group">
                <select id="btncolor" name="city" id="city">
                    <option value="null" selected disabled style=" display: none;">Qyteti</option>
                    <option value="tirane" >Tirane</option>
                    <option value="durres">Durres</option>
                    <option value="korce">Korce</option>
                    <option value="vlore">Vlore</option>
                </select>
            </div>

            <div class="btn-group">
                <select id="btncolor" name="category" id="category">
                    <option value="null" selected disabled style=" display: none;">Kategoria</option>
                    <option value="adoptim" >Adoptim</option>
                    <option value="petsitting">Pet sitting</option>
                    <option value="veteriner">veteriner</option>
                </select>
            </div>
            <button type="submit" id="btncolor" class="btn" style="margin-left: 2%; background-color:#e45225; border-radius: 40px; color:white;">Shto</button>
        </form>
        </div> <!-- filter end -->
        
        <br>

        <!-- postet start -->
        <div class="container col-md-8">
            <div class="row justify-content-center">
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
                            <img src="./img/a.jpg" alt="post_photo">
                        </div>
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
                            <img src="./img/c.jpg" alt="post_photo">
                        </div>
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
                            <img src="./img/b.jpg">
                        </div>
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
                            <img src="./img/a.jpg" alt="post_photo">
                        </div>
                    </div>
                    <div class="row">
                    05/09/2020  -    @fotikerkeshi  -   Adoptim   -   #2432489
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
                            <img alt="post_photo">
                        </div>
                    </div>
                </div>
            </a>
            </div>
        </div> <!-- postet end -->
        
        <br>

        <?php
            include_once('./includes/footer.php');
        ?>
    </body>

    <script>

        var data = <?php echo json_encode(retrieve_data()); ?>;
        var imgs = <?php echo json_encode(show_photo()); ?>;

        console.log(data);
        var oldSrc = 'data:image/jpeg;base64,';

        var images = $('img');

        $.each(images, function(i, v){
            $(this).attr('src', oldSrc + imgs[i]);
        });

        $(document).ready(function () {
            $("a").click(function () {
                


            });
        });
            
        
    </script>

</html>

