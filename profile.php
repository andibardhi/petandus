<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Profile</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/profile-style.css">
    <link rel="stylesheet" href="./css/header-style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <?php
    include_once('./includes/navbar.php');
    include_once('functions/config.php'); 
    $data = getUserPosts();
    $profileData = getDataFromProfile();
    $userData = getDataFromUser();
    // echo("Profile Data ->  ");
    // var_dump($profileData);
    // echo("<br>");
    // echo("User Data ->  ");
    // var_dump($userData);
    // exit();
    ?>
    <br>
    <div class="container">
        <div class="row justify-content-around" id="main">
            <div class="col-md-3">
                <div class="row justify-content-center">
                    <img class="rounded-circle profile-picture" src="./img/profile-picture.jpg" height="150" width="150">
                </div>
                <div class="row justify-content-center">
                    <h4 class="text-center"><?php echo $profileData[1].' '. $profileData[2]?></h4>
                </div>
                <br>
                <div class="row justify-content-center">
                    <div class="col personal-info">
                        <div class="row justify-content-center">
                            <a href="./edit-profile.php?userid=<?php echo $profileData[0]?>" class="fa fa-edit edit-icon" style="text-decoration: none;"></a>
                            <h6 class="text-center">Te dhenat personale</h6>
                        </div>
                        <div class="row">
                            <ul>
                                <li><?php echo $userData[2];?></li>
                                <li><?php echo $userData[3].' vjec'?></li>
                                <li><?php echo $userData[5]?></li>
                                <li><?php echo $userData[6]?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
            <a href="./new-post.php" class="btn create-post"> <i class="fa fa-plus-circle"></i> Krijo post </a>
            
                <div class="row justify-content-center">
                    
                    <?php
                       
                    if(count($data)>0){

                        foreach ($data as $postValue){
                            $title = $postValue[1];
                            $description = $postValue[2];
                            $postId = $postValue[0];
                            $modifikoPostin = "Modifiko Postimin";
                          
                        ?>
                            <a href="./single-post.php?id=<?php echo $postId?>"> 
                                <div class="row single-post">
                                    <title class="row"><?php echo $title?></title>
                                    <div class="row justify-content-around">
                                        <div class="col-7 description">
                                        <?php echo $description?>
                                        </div>
                                        <div class="col-5">
                                            <img src="./img/profile-dog.jpg">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <a href="./single-post.php?id=<?php echo $postId?>">
                                            <button class="btn edit-post"> <?php echo $modifikoPostin?> </button>
                                        </a>
                                    </div>
                                </div>
                            </a>
                        <?php } 
                    }else {?>
                    <br>
                    <br>
                        <a href="./new-post.php" class="btn create-post"> <i class="fa fa-plus-circle"></i> Krijo post </a>
                        <h1 style="margin-top: 2em">Ju akoma nuk keni krijuar postime!</h1>
                    <?php }?>
                </div>
            </div>

        </div>
    </div>
    <?php
    include_once('./includes/footer.php');
    ?>
</body>

</html>