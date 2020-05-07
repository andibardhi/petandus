<?php include_once('functions/config.php'); ?>
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
    <?php include_once('./includes/navbar.php'); ?>
    <br>
    <div class="container">
    <?php post_validation(); ?>
    <div class="alert alert-danger text-center" id="error" style="visibility: hidden;"></div>
      <form class="form" method="post" id="newpost" enctype="multipart/form-data">
          <h1>Krijoni post</h1>
          <label for="title">Titull:</label>
          <input type="text" class="form-control" id="title" name="title">
          <label for="description">Përshkrim:</label>
          <textarea id="description" name="description" rows="4" cols="50"></textarea><br><br>
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="image[]" id="image" multiple accept=".jpg, .png, .jpeg">
            <label class="custom-file-label" for="images">Përzgjidh foto...</label>
          </div><br><br>
          <label for="phonenumber">Nr i kontaktit:</label>
          <input type="text" class="form-control" id="phonenumber" name="phonenumber">
          <label for="email">Emaili i kontaktit:</label>
          <input type="text" class="form-control" id="email" name="email">
          <label for="city">Qyteti:</label>
          <select class="custom-select" name="city" id="city">
              <option value="tirane">Tirane</option>
              <option value="durres">Durres</option>
              <option value="korce">Korce</option>
              <option value="vlore">Vlore</option>
          </select>
          <label for="animal">Kafsha:</label>
          <select class="custom-select" name="animal" id="animal">
              <option value="qen">Qen</option>
              <option value="mace">Mace</option>
              <option value="peshk">Peshk</option>
              <option value="kavje">Kavje</option>
              <option value="tjeter">Tjetër</option>
          </select>
          <label for="category">Kategoria:</label>
          <select class="custom-select" name="category" id="category">
              <option value="petsitting">Pet Sitting</option>
              <option value="adoptim">Adoptim</option>
              <option value="petcare">Kujdesje</option>
              <option value="lajmerim">Lajmerim</option>
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
        $("#btn").click(function () {
          var title = $('#title').val();
          var description = $('#description').val();
          var phonenumber = $('#phonenumber').val();
          var email = $('#email').val();
          var city = $("#city option:selected").text();
          var animal = $("#animal option:selected").text();
          var category = $("#category option:selected").text(); 
          var files_length = $('#image').length;
          var image = $('#image').val();
          var min_char = 05;
          var max_char = 30;
          var desc_min_char = 005;
          var desc_max_char = 200;
          var errors = "";
          var count = 0;
          
          if(title.length > max_char){
            errors+="<br>Ju lutem vendosni titullin me më pak se 30 gërma!";
            count++;
          }
          if(title.length < min_char){
            errors+="<br>Ju lutem vendosni titullin me më shumë se 5 gërma!";
            count++;
          }
          if(description.length > desc_max_char){
            errors+="<br>Ju lutem vendosni përshkrimin me më pak se 30 gërma!";
            count++;
          }
          if(description.length < desc_min_char){
            errors+="<br>Ju lutem vendosni përshkrimin me më shumë se 5 gërma!";
            count++;
          }
          if(phonenumber < 10){
            errors+="<br>Ju lutem vendosni nje numër telefoni te saktë!";
            count++;
          }
          var emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
          if(!emailRegex.test(email)){
            errors+="<br>Email jo i saktë!";
            count++;
          }
          if(files_length == 0){
            errors+="<br>Ju duhet të ngarkoni të paktën një foto";
            count++;
          }
          if(files_length > 5){
            errors+="<br>Ju nuk duhet të ngarkoni më shumë se 5 foto";
            count++;
          }

          var formData = new FormData(document.getElementById("newpost"));
          formData.set('city', city);
          formData.set('animal', animal);
          formData.set('category', category);

          if (title != "" && description != "" && phonenumber != "" && email != "" && city != "" && animal != "" && category != "") {
            $.ajax({
                url: 'new-post.php',
                method: 'POST',
                data: formData,
                contentType:false,
                cache:false,
                processData:false,
                success: function(data){
                  if(data.slice(0, 5000).includes("success")){
                      $('#success').html("Postimi u krijua me sukses");
                      $('#success').css("visibility", "visible");
                  }
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

      // Shfaqet emri i file ne box
      $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
      });

    </script>

    <?php
    include_once('./includes/footer.php');
    ?>
</body>

</html>