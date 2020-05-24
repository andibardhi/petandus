<!DOCTYPE html>
<html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta charset="utf-8">
      <title>Pet&Us</title>
      <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <link rel = "stylesheet" type = "text/css" href = "./css/header-style.css">
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      <link rel = "stylesheet" type = "text/css" href = "./css/homepage-style.css">
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
                <li data-target="#carousel" data-slide-to="3"></li>
            </ol>
          <div class="carousel-inner">              
            <div class="carousel-item active">
              <img class="d-block w-100" src="./img/dog.jpg" alt="slide1">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="./img/cat.jpg" alt="slide1">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="./img/pets.jpg" alt="slide2">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="./img/rabbit.jpg" alt="slide3">              
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="./img/fish.jpg" alt="slide4">              
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
                <div class="list-unstyled mt-3 mb-4 opacity">
                
                <a href="http://localhost/petus/posts.php?category=adoptim">
                  <div class="text-centered" style="padding-left: 22px;"> Adoptim</div>
                  <img src="./img/adopt.jpg" class="foto" >
                </a>
                </div>
              </div>
            
              
            
              <div class="card-body">
                <div class="list-unstyled mt-3 mb-4 opacity">
                  
                  <a href="http://localhost/petus/posts.php?category=veteriner"> 
                    <div class="text-centered">Veteriner</div>
                    <img src="./img/vet.jpg" class="foto"  >
                  </a>
                </div>
              </div>
            

              <div class="card-body">
                <div class="list-unstyled mt-3 mb-4 opacity">
                  <a href="http://localhost/petus/posts.php?category=pet+sitting"> 
                    <div class="text-centered" style="margin-left: 8px;">Pet-Sitting</div>
                    <img src="./img/petsit.jpg" class="foto" >
                  </a> 

                </div>
              </div>
            
            
        </div>
      </div>
<!-- sherbimet finish -->


<!-- rreth nesh start -->
<div style="background-color:#FFEBB6;">
  <div class="container" >
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4" style="color: #e45225; 
        font-family: Montserrat, sans-serif; 
        text-transform: uppercase; 
        letter-spacing: 0.1em;"> 
        <b>Rreth nesh</b>
      </h1>
    </div>
    <div class="row justify-content-center">
      <div class="col-5" style="background-color:#e45225; color:white;">
        <h2 class="d-flex justify-content-center"> Kush Jemi </h2>
        <p >
        Këtu përdoruesit do të bashkëveprojnë me njëri-tjetrin përmes postimeve të ndryshme. 
        Postimet mund të jenë në lidhje me adoptimin ndaj kafshëve, njoftime per kafshë të humbura, apo dhe shërbime kujdesi.
        Gjithashtu portali ofron dhe një nënfaqe blog, ku do të paraqiten shkrime edukative apo informative nga stafi jone lidhur me tematikën e portalit.
        </p>
      </div>

      <div class="col-5" style="background-color:#e45225; color:white; margin-left: 50px;">
      <h2 class="d-flex justify-content-center" > Qellimi Jone </h2>
        <p>
        Objektivi i portalit është krijimi i një ure lidhëse midis personave të cilët kërkojnë kafshë shtëpiake dhe atyre të cilët kërkojnë të adoptojnë një të tillë. Gjithashtu njoftimet për kafshë të humbura dhe shërbimet e kujdesit janë shërbime me funksion humanitar për komunitetin.
        </p>
      </div>
    </div>
  </div>
  <br><br>
</div>


<!-- rreth nesh finish -->
      <?php
      include_once('./includes/footer.php');
      ?>
  </body>
</html>

