<!DOCTYPE html>
<html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta charset="utf-8">
      <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <link rel = "stylesheet" type = "text/css" href = "./css/header-style.css">
      <link rel = "stylesheet" type = "text/css" href = "./css/homepage-style.css">
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    </head>
    
    <body style="background-color: #fff9e9;">
<?php
include_once('./includes/navbar.php');
?>
<br>

<!-- slider start -->
      <div class="container">
        <div id="carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                <li data-target="#carousel" data-slide-to="1"></li>
                <li data-target="#carousel" data-slide-to="2"></li>
            </ol>
          <div class="carousel-inner">              
            <div class="carousel-item active">
              <img class="d-block w-100" src="./img/a.jpg" alt="slide1">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="./img/c.jpg" alt="slide2">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="./img/a.jpg" alt="slide3">              
            </div>
          </div>
            
          <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Prev</span>
          </a>
            
          <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
<!-- slider finish -->

<br>

<!-- sherbimet start -->
      <div>
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
          <h1 class="display-4" style="color: #e45225; 
            font-family: Montserrat, sans-serif; 
            text-transform: uppercase; 
            letter-spacing: 0.1em;"> 
            <b>Sherbimet tona</b>
          </h1>
        </div>
        
        <div class="container">
          <div class="card-deck mb-3 text-center">     

            
              <div class="card-body">
                <div class="list-unstyled mt-3 mb-4">
                  <a href="#"> <img src="./img/b.jpg" class="opacity"></a>
                </div>
              </div>
            
              
            
              <div class="card-body">
                <div class="list-unstyled mt-3 mb-4">
                  <a href="#"> <img src="./img/b.jpg" class="opacity"></a>
                </div>
              </div>
            

              <div class="card-body">
                <div class="list-unstyled mt-3 mb-4">
                  <a href="#"> <img src="./img/b.jpg" class="opacity">
                    
                  </a> 

                </div>
              </div>
            
            
        </div>
      </div>
<!-- sherbimet finish -->
      <br>
      <?php
      include_once('./includes/footer.php');
      ?>
  </body>
</html>

