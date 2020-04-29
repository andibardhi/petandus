<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Profile</title>
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
    ?>
    <br>
    <div class="container">
                <form class="form">
                    <h1>Modifikoni profilin</h1>
                    <label for="email">Emer:</label>
                    <input type="text" class="form-control" id="firstname" value="Emer"  name="firstname">
                    <label for="email">Mbiemer:</label>
                    <input type="text" class="form-control" id="lastname" value="Mbiemer" name="lastname">
                    <label for="email">Datelindje:</label>
                    <input type="date" class="form-control" id="birthdate" value="1990-03-25" name="lastname">
                    <label for="email">Nr telefoni:</label>
                    <input type="text" class="form-control" id="phonenumber" value="+355 68 XXXXXXX" name="lastname">
                    <label for="email">Qyteti:</label>
                    <select class="custom-select" name="city" id="city">
                        <option value="tirane">Tirane</option>
                        <option value="durres">Durres</option>
                        <option value="korce">Korce</option>
                        <option value="vlore">Vlore</option>
                    </select>
                    <label for="email">Konfirmoni fjalekalimin:</label>
                    <input type="password" class="form-control" id="password" value="" name="lastname">
                    <br>
                    <div class="row justify-content-center">
                        <button class="btn btn-primary text-center" type="button">Konfirmo</button>
                    </div>
                    <br>
                </form>   
    </div>
    <?php
    include_once('./includes/footer.php');
    ?>
</body>

</html>