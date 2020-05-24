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
    $allCategories = getAllData("emer","kategori");

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
            <input type="date" class="form-control" id="birthdate" placeholder="1990-03-25" name="birthday" value="<?php echo $profileData[3]?>">
            <label for="phone">Nr telefoni:</label>
            <input type="text" class="form-control" id="phonenumber" placeholder="<?echo '068 xx xx xxx'?>" value="<?php echo $profileData[5]?>"  name="phone">
            <label for="city">Qyteti:</label>
            <select class="custom-select" name="city" id="city" value="<?php echo $profileData[6]?>">
                <?php printList($allCategories) ?>
            </select>
            <label for="email">Vendosni e-mail</label>
            <input type="email" class="form-control" name="email" placeholder="Vendosni Email" value="<?php echo $userData[2]?>">
            <div class="row justify-content-center">
                <button class="btn btn-primary text-center" type="submit" name = "submitEditProfile">Modifiko profilin</button>
            </div>
            <br>
        </form>   
    </div>
    <?php
    include_once('./includes/footer.php');
    ?>
 
</body>

</html>