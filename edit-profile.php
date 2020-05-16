<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Modifikoni profilin</title>
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
    include_once('functions/config.php'); 
    $profileData = getDataFromProfile();
    $userData = getDataFromUser();
    updateProfile();
    ?>
    <br>
    <div class="container">
                <form class="form" id="editProfile" method="POST">
                    <h1>Modifikoni profilin</h1>
                    <label for="firstname">Emer:</label>
                    <input type="text" class="form-control" id="firstname" placeholder="Emer"  name="firstname" value="<?php echo $profileData[1]?>">
                    <label for="lastname">Mbiemer:</label>
                    <input type="text" class="form-control" id="lastname" placeholder="Mbiemer" name="lastname" value="<?php echo $profileData[2]?>" >
                    <label for="birdday">Datelindje:</label>
                    <input type="date" class="form-control" id="birthdate" placeholder="1990-03-25" name="birthday">
                    <label for="phone">Nr telefoni:</label>
                    <input type="text" class="form-control" id="phonenumber" placeholder="+355 68 XXXXXXX" name="phone">
                    <label for="city">Qyteti:</label>
                    <select class="custom-select" name="city" id="city">
                        <option><?php echo $profileData[6]?></option>
                        <option value="tirane">Tirane</option>
                        <option value="durres">Durres</option>
                        <option value="korce">Korce</option>
                        <option value="vlore">Vlore</option>
                    </select>
                    <label for="email">Vendosni e-mail</label>
                    <input type="email" class="form-control" name="email" placeholder="Vendosni Email" value="<?php echo $userData[2]?>">
                    <label for="pasword">Konfirmoni fjalekalimin:</label>
                    <input type="password" class="form-control" id="password" placeholder="Pasword" name="pasword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required title="Ju lutem plotsoni kriteren e meposhtme">
                    <br>
                    <div id="message">
                        <h6>Fjalkalimi duhet te jete si ne vijim:</h6>
                        <p id="letter" class="invalid">Nje <b>germ te vogel</b></p>
                        <p id="capital" class="invalid">Nje <b>germ te madhe</b></p>
                        <p id="number" class="invalid">Nje <b>numer</b></p>
                        <p id="length" class="invalid">Minimumi <b>6 karaktere</b></p>`
                    </div>
                    <div class="row justify-content-center">
                        <button class="btn btn-primary text-center" type="submit" name = "submitEditProfile">Modifiko profilin</button>
                    </div>
                    <br>
                </form>   
    </div>
    <?php
    include_once('./includes/footer.php');
    ?>
    <style>
        /* Style all input fields */
        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
        }

        /* Style the submit button */
        input[type=submit] {
            background-color: #4CAF50;
            color: white;
        }

        /* Style the container for inputs */
        .container {
            background-color: #f1f1f1;
            padding: 20px;
        }

        /* The message box is shown when the user clicks on the password field */
        #message {
            display:none;
            background: #f1f1f1;
            color: #000;
            position: relative;
            padding: 20px;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        #message p {
            padding: 5px 10px;
            font-size: 12px;
        }

        /* Add a green text color and a checkmark when the requirements are right */
        .valid {
            color: green;
        }

        .valid:before {
            position: relative;
            left: -35px;
        }

        /* Add a red text color and an "x" icon when the requirements are wrong */
        .invalid {
            color: red;
        }

        .invalid:before {
            position: relative;
            left: -35px;
        }
            </style>
    <script>
        var myInput = document.getElementById("password");
        var letter = document.getElementById("letter");
        var capital = document.getElementById("capital");
        var number = document.getElementById("number");
        var length = document.getElementById("length");

        myInput.onfocus = function() {
        document.getElementById("message").style.display = "block";
        }

        // When the user clicks outside of the password field, hide the message box
        myInput.onblur = function() {
        document.getElementById("message").style.display = "none";
        }

        // When the user starts to type something inside the password field
        myInput.onkeyup = function() {
        // Validate lowercase letters
        var lowerCaseLetters = /[a-z]/g;
        if(myInput.value.match(lowerCaseLetters)) {
            letter.classList.remove("invalid");
            letter.classList.add("valid");
        } else {
            letter.classList.remove("valid");
            letter.classList.add("invalid");
        }

        // Validate capital letters
        var upperCaseLetters = /[A-Z]/g;
        if(myInput.value.match(upperCaseLetters)) {
            capital.classList.remove("invalid");
            capital.classList.add("valid");
        } else {
            capital.classList.remove("valid");
            capital.classList.add("invalid");
        }

        // Validate numbers
        var numbers = /[0-9]/g;
        if(myInput.value.match(numbers)) {
            number.classList.remove("invalid");
            number.classList.add("valid");
        } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
        }

        // Validate length
        if(myInput.value.length >= 8) {
            length.classList.remove("invalid");
            length.classList.add("valid");
        } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
        }
        }
    </script>
</body>

</html>