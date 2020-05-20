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
                    <option value="tirane" >Tiranë</option>
                    <option value="durres">Durrës</option>
                    <option value="korce">Korçë</option>
                    <option value="vlore">Vlorë</option>
                </select>
            </div>

            <div class="btn-group">
                <select id="btncolor" name="category" id="category">
                    <option value="null" selected disabled style=" display: none;">Kategoria</option>
                    <option value="adoptim" >Adoptim</option>
                    <option value="pet sitting">Pet sitting</option>
                    <option value="veteriner">veteriner</option>
                </select>
            </div>
            <button type="submit" id="btncolor" class="btn" style="margin-left: 2%; background-color:#e45225; border-radius: 40px; color:white;">Shto</button>
        </form>
        </div> <!-- filter end -->
        
        <br>

        <!-- postet start -->
        <div class="container col-md-8" id="posts">
                <?php
                if(!empty($_GET))
                    generate_post(1);
                else
                    generate_post(0);
                ?>
        </div> <!-- postet end -->

        <br>

        <?php
            include_once('./includes/footer.php');
        ?>
    </body>

</html>

