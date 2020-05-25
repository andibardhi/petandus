<?php if(isset($_COOKIE['username'])){
        header("Location: ./index.php");
      } 
?>
<?php include_once('functions/config.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>َPet&Us Regjistrohu</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="css/style-login-register.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </head>
  <body>

    
    
<div class="container h-100">
    <?php register_validation(); ?>
    <?php
      $allCities = getAllData("emer","qytet");
      if (isset($_SESSION['info_msg']) && $_SESSION['info_msg'] == 'postim anonim'){
        echo('<div class="alert alert-danger text-center">Ju duhet të keni një llogari për të postuar</div>');
        unset($_SESSION['info_msg']);
      }
    ?>
    <div class="alert alert-danger text-center" id="error" style="visibility: hidden;"></div>
    <div class="row align-items-center justify-content-center h-100">
      <div class="col-6 mx-auto">
          <div id="box" class="box"  >
          <a href="./index.php" class="logo"> PET&US </a>
            <form id="form" autocomplete="on">
              <h1>Regjistrohu</h1>
              <input type="text" name="firstname" id="firstname" placeholder="Emri">
              <input type="text" name="lastname" id="lastname" placeholder="Mbiemri">
              <input type="date" name="birthdate" id="birthdate" placeholder="Datëlindja" max="2002-05-22" >
              <input type="text" name="phonenumber" id="phonenumber" placeholder="Numer telefoni" style="margin-bottom: 0;">
              <p for="phonenumber">*Numri duhet te filloj me 06</p>
              <select id="city" name="city" >
                  <option value="null" selected disabled > Qyteti </option>
                  <?php _printList($allCities, 'Qyteti') ?>
              </select>
              <input type="text" name="username" id="username" placeholder="Username">
              <input type="text" name="email" id="email"  placeholder="Email">
              <input type="password" name="password" id="password" placeholder="Fjalëkalimi">
              <input type="password" name="cpassword" id="cpassword" name="cpassword" placeholder="Konfirmim Fjalëkalimi">
              <input type="file" name="img" id="img" placeholder="Ngarkoni foton tuaj" accept=".jpg, .png, .jpeg">
              <span id="uploaded_image"></span>
              </form>
              <button id="btn"> Regjistrohu </button> 
              <label> Keni nje llogari? <a href="./login.php">Login!</a> </label> 
          </div>
                </div>
            </div>
    </div>

    <script>
        $(document).ready(function () {

            //maxdate per datelindjen 
            var maxDay = new Date().getDate();
            var maxMonth = new Date().getMonth()+1;
            var maxYear = new Date().getFullYear()-18;
            var maxDate = ""+maxYear+"-";

            if(maxMonth.toString().length==1){
              maxMonth = "0"+maxMonth;
            }
            maxDate+=maxMonth+"-";

            if(maxDay.toString().length==1){
              maxDay = "0"+maxDay;
            }
            maxDate+=maxDay;

            $('input[type="date"]').attr("max", maxDate);


            var img_errors = [];
            $("#profile_image").change(function(){
                img_errors = [];
                var img = document.getElementById("profile_image").files[0];
                var img_name = img.name;
                var img_size = img.size;
                var img_extension = img_name.split(".").pop().toLowerCase();
                if($.inArray(img_extension, ['gif', 'png', 'jpg', 'jpeg']) == -1){
                    img_errors.push("Imazhi duhet format .png, .jpg ose .gif!");
                    alert(img_errors);
                }
                //Madhesia me shume se 2.5mb
                if(img_size > 2500000){
                    img_errors.push("Imazhi nuk lejohet më tepër se 2.5mb!");
                    alert(img_errors);
                }
            });

            $("#btn").click(function () {
                var firstname = $('#firstname').val();
                var lastname = $('#lastname').val();
                var birthdate = $('#birthdate').val();
                var phonenumber = $('#phonenumber').val();
                var city = $("#city option:selected").val();
                var email = $('#email').val();
                var username = $('#username').val();
                var password = $('#password').val();
                var cpassword = $('#cpassword').val();
                var max_char = 25;
                var min_char = 3;
                var count = 0;
                var errors = "";
                //Variabli ku ruhet imazhi
                var img = document.getElementById("img").files[0];

                if(firstname.length > max_char){
                  errors+="<br>Ju lutem vendosni emrin me më pak se 25 gërma!";
                  count++;
                }
                if(firstname.length < min_char){
                  errors+="<br>Ju lutem vendosni emrin me më shumë se 2 gërma!";
                  count++;
                }
                if(lastname.length > max_char){
                  errors+="<br>Ju lutem vendosni mbiemrin me më pak se 25 gërma!";
                  count++;
                }
                if(lastname.length < min_char){
                  errors+="<br>Ju lutem vendosni mbiemrin me më shumë se 2 gërma!";
                  count++;
                }
                if(username.length > max_char){
                  errors+="<br>Ju lutem vendosni username me më pak se 25 gërma!";
                  count++;
                }
                if(username.length < min_char){
                  errors+="<br>Ju lutem vendosni username me më shumë se 2 gërma!";
                  count++;
                }
                if(password.length > max_char){
                  errors+="<br>Ju lutem vendosni fjalëkalimin me më pak se 25 karaktere!";
                  count++;
                }
                if(password.length < 6){
                  errors+="<br>Ju lutem vendosni fjalëkalimin me më shumë se 6 karaktere!";
                  count++;
                }
                if(password.localeCompare(cpassword) != 0 ){
                  errors+="<br>Fjalëkalimet nuk përshtaten!";
                  count++;
                }

                if(birthdate == ""){
                  errors+="<br>Vendosi datelindjen!";
                  count++;
                }

                if(parseInt(birthdate.slice(0,4))>maxYear ){
                  errors+="<br>Duhet te jeni me i madh se 18 vjec!";
                  count++;
                }else if(parseInt(birthdate.slice(0,4))==maxYear ){
                  if(parseInt(birthdate.slice(5,7))>maxMonth ){
                    errors+="<br>Duhet te jeni me i madh se 18 vjec!";
                    count++;
                  }else if(parseInt(birthdate.slice(5,7))==maxMonth){
                    if(parseInt(birthdate.slice(8,10))>maxDay ){
                    errors+="<br>Duhet te jeni me i madh se 18 vjec!";
                    count++;
                  }
                  }
                }


                if(phonenumber.length != 10 || isNaN(phonenumber) || /^\d+$/.test(phonenumber) == false){
                  errors+="<br>Vendosi nje numer telefoni te saktë!";
                  count++;
                }
                
                if(phonenumber.slice(0,2)!="06"){
                  errors+="<br>Numri duhet te filloj me 06";
                  count++;
                }

                if(city=="null"){
                  errors+="<br>Zgjidhni nje qytet";
                  count++;
                }

                var usernameRegex = /^[a-z0-9_-]+$/;
                if(!usernameRegex.test(username)){
                  errors+="<br>Username jo i saktë!(username duhet te permbaje vetem shkronja te vogla,numra , - dhe _)";
                  count++;
                }

                var emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                if(!emailRegex.test(email)){
                  errors+="<br>Email jo i saktë!";
                  count++;
                }
                var input = document.getElementById("img");
                var formData = new FormData(document.getElementById("form"));
                formData.append( 'img', input.files[0] );
                
                if(input.files[0]!=null){
                  if(input.files[0].name.slice(-3)!="jpg" && input.files[0].name.slice(-3)!="png" && input.files[0].name.slice(-4)!="jpeg" ){
                    errors+="<br>Formati i fotos nuk suportohet!";
                    count++;
                  }
                }

                if (firstname != "" && lastname != "" && birthdate != "" && phonenumber != "" && city != "" && email != "" && username != ""  && password != ""  && cpassword != "" && password==cpassword && city!="null" && count==0 ) {
                    $.ajax({
                        method: 'POST',
                        data: formData,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(r){
                          if(r.slice(0, 600).includes("success")){
                            window.location.href="login.php";
                        }
                        else{
                            if(r.slice(0, 600).includes('Username është në përdorim!')){
                              errors+="<br>Username është në përdorim!";
                              count++;
                            }
                            if(r.slice(0, 600).includes('Email-i është në përdorim!')){
                              errors+="<br>Email-i është në përdorim!";
                              count++;
                            }
                            count=count+50;
                            $('#error').html(errors.slice(4,errors.length));
                            $('#box').css("top",count.toString()+"%");
                            $('#error').css("visibility", "visible");
                        }
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


<?php require_once('includes/footer.php')?>
