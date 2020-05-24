<?php include_once('functions/config.php'); ?>
<?php
  if(!isset($_SESSION['username'])){
    redirect('register.php');
    exit;
  }

  if (isset($_POST['ajax'])){
    post_validation();
    exit;
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Krijoni post</title>
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
    <?php 
      include_once('./includes/navbar.php'); 
      $allCategories = getAllData("emer","kategori");
      $allCities = getAllData("emer","qytet");
      $allAnimals = getAllData("emer","kafshe");
    
    ?>


    <br>
    <div class="container">
    <div class="alert alert-danger text-center" id="error" style="visibility: hidden;"></div>
      <form class="form" method="post" id="newpost" enctype="multipart/form-data">
          <h1>Krijoni post</h1>
          <label for="title">Titull:</label>
          <input type="text" class="form-control" id="title" name="title">
          <label for="description">Përshkrim:</label>
          <textarea id="description" name="description" rows="4" cols="50"></textarea><br><br>
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="image[]" id="image" accept=".jpg, .png, .jpeg">
            <label class="custom-file-label" for="images">Përzgjidh foto...</label>
          </div><br><br>
          <label for="phonenumber">Nr i kontaktit:</label>
          <input type="text" class="form-control" id="phonenumber" name="phonenumber">
          <label for="email">Emaili i kontaktit:</label>
          <input type="text" class="form-control" id="email" name="email">
          <label for="city">Qyteti:</label>
          <select class="custom-select" name="city" id="city">
          <?php _printList($allCities, $allCities[0][0]) ?>
          </select>
          <label for="animal">Kafsha:</label>
          <select class="custom-select" name="animal" id="animal" >
              <?php _printList($allAnimals, $allAnimals[0][0]) ?>
          </select>
          <label for="category">Kategoria:</label>
          <select class="custom-select" name="category" id="category">
          <?php _printList($allCategories, $allCategories[0][0]) ?>
          </select>
          <br>
          <div class="row justify-content-center">
              <input type="button" class="btn btn-primary text-center" id="btn" value="Konfirmo"></button>
          </div>
          <br>
          <div class="alert alert-success text-center" id="success" style="visibility: hidden;"></div>
      </form>
    </div>

    <script>

      $(document).ready(function () {

        // Shfaqet emri i file ne box
        $(".custom-file-input").on("change", function() {
          var fileName = $(this).val().split("\\").pop();
          $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

        $("#btn").click(function () {
          var title = $('#title').val();
          var description = $('#description').val();
          var phonenumber = $('#phonenumber').val();
          var email = $('#email').val();
          var city = $("#city option:selected").text();
          var animal = $("#animal option:selected").text();
          var category = $("#category option:selected").text(); 
          var files_length = $('#image')[0].files.length;
          var image = $('#image').val();
          var min_char = 05;
          var max_char = 30;
          var desc_min_char = 005;
          var desc_max_char = 200;
          var errors = "";
          var count = 0;
          
          if(title.length > max_char){
            errors += "<br>Ju lutem vendosni titullin me më pak se 30 gërma!";
            count++;
          }

          if(title.length < min_char){
            errors += "<br>Ju lutem vendosni titullin me më shumë se 5 gërma!";
            count++;
          }

          if(description.length > desc_max_char){
            errors += "<br>Ju lutem vendosni përshkrimin me më pak se 250 gërma!";
            count++;
          }

          if(description.length < desc_min_char){
            errors += "<br>Ju lutem vendosni përshkrimin me më shumë se 5 gërma!";
            count++;
          }

          if(phonenumber.length > 12 || phonenumber.length < 10 || /^\d+$/.test(phonenumber) == false){
            errors += "<br>Ju lutem vendosni një numër telefoni të saktë!";
            count++;
          }

          var emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
          if(!emailRegex.test(email)){
            errors += "<br>Email jo i saktë!";
            count++;
          }

          if(files_length == 0){
            errors += "<br>Ju duhet të ngarkoni të paktën një foto";
            count++;
          }

          if (title != "" && files_length != 0 && description != "" && phonenumber != "" && email != "" && city != "" && animal != "" && category != "" && count == 0){
            
            $('#error').css("visibility", "hidden");

            var formData = new FormData(document.getElementById("newpost"));
            formData.append('ajax', 1);
            // .val() => .text()
            formData.set('city', city);
            formData.set('animal', animal);
            formData.set('category', category);

            $.ajax({
                method: 'POST',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function(r){
                    console.log(r);
                    $('#success').html("Postimi u krijua me sukses");
                    $('#success').css("visibility", "visible");
                },
                error: function(r){
                  console.log(r);
                  $('#success').html("Ndodhi një gabim. Ju lutem provoni përsëri!");
                  $('#success').removeClass("alert alert-success text-center");
                  $('#success').addClass("alert alert-danger text-center");
                  $('#success').css("visibility", "visible");
                    $('#success').html("Postimi u krijua me sukses");
                    $('#success').css("visibility", "visible");
                    setTimeout(function(){
                      window.location.replace("./posts.php");
                    }, 2000);
                },
                error: function(r){
                  $('#error').html(r);
                  $('#error').css("visibility", "visible");
                }
            });
          }
          else{
            count=(count*2)+48;
            $('#error').html(errors.slice(4,errors.length));
            $('#box').css("top",count.toString()+"%");
            $('#error').css("visibility", "visible");
          }
        });
      });

    </script>

    <?php
    include_once('./includes/footer.php');
    ?>
</body>

</html>