<?php include_once('functions/config.php'); ?>
<?php 
  if (isset($_POST['ajax'])){
    blog_validation();
    exit;
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Krijoni blog</title>
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
    <div class="alert alert-danger text-center" id="error" style="visibility: hidden;"></div>
      <form class="form" method="post" id="newblog" enctype="multipart/form-data">
          <h1>Krijoni blog</h1>
          <label for="title"></label>
          <input type="text" class="form-control" id="title" name="title">
          <label for="description"></label>
          <textarea id="description" name="description" rows="4" cols="50"></textarea><br><br>
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="image[]" id="image" accept=".jpg, .png, .jpeg">
            <label class="custom-file-label" for="images">Përzgjidh foto...</label>
          </div><br><br>
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
        var files_length = $('#image')[0].files.length;
        var image = $('#image').val();
        var min_char = 05;
        var max_char = 30;
        var desc_min_char = 005;
        var desc_max_char = 2048;
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

        if(files_length == 0){
          errors += "<br>Ju duhet të ngarkoni të paktën një foto";
          count++;
        }

        if (title != "" && files_length != 0 && description != "" && count == 0){
          
          $('#error').css("visibility", "hidden");

          var formData = new FormData(document.getElementById("newblog"));
          formData.append('ajax', 1);

          $.ajax({
              method: 'POST',
              data: formData,
              contentType: false,
              cache: false,
              processData: false,
              success: function(r){
                  $('#success').html("Blogu u krijua me sukses");
                  $('#success').css("visibility", "visible");
                  window.location.replace("./blog.php");
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

  <?php include_once('./includes/footer.php'); ?>

</body>

</html>