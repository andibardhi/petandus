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
    ?>
    <br>
    <div class="container">
                <form class="form">
                    <h1>Krijoni post</h1>
                    <label for="email">Titull:</label>
                    <input type="text" class="form-control" id="title" name="title">
                    <label for="description">Pershkrim:</label>
                    <textarea id="w3mission" rows="4" cols="50"></textarea>
                    <label for="email">Nr i kontaktit:</label>
                    <input type="text" class="form-control" id="birthdate" name="lastname">
                    <label for="email">Emaili i kontaktit:</label>
                    <input type="text" class="form-control" id="phonenumber" name="lastname">
                    <label for="email">Qyteti:</label>
                    <select class="custom-select" name="city" id="city">
                        <option value="tirane">Tirane</option>
                        <option value="durres">Durres</option>
                        <option value="korce">Korce</option>
                        <option value="vlore">Vlore</option>
                    </select>
                    <label for="email">Kafsha:</label>
                    <select class="custom-select" name="city" id="city">
                        <option value="qen">Qen</option>
                        <option value="mace">Mace</option>
                        <option value="peshk">Peshk</option>
                        <option value="kavje">Kavje</option>
                    </select>
                    <label for="email">Kategoria:</label>
                    <select class="custom-select" name="city" id="city">
                        <option value="petsitting">Pet sitting</option>
                        <option value="adoptim">Adoptim</option>
                        <option value="petcare">Kujdese</option>
                        <option value="lajmerim">Lajmerim</option>
                    </select>
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