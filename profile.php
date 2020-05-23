<html lang="en" dir="ltr">
<!DOCTYPE html>

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
    
    $ffinfo    = new finfo(FILEINFO_MIME);
    $mimeTypeP = $ffinfo->buffer($profileData[4]);
    $imageTypeP = strstr($mimeTypeP, ';', true);


    $userData = getDataFromUser();

    $img = base64_encode($profileData[4]);
    // $image = $img[0];
    // var_dump($img);
    // exit();
    
 

    ?>
    <br>
    <div class="container">
        <div class="row justify-content-around" id="main">
            <div class="col-md-3">
                <div class="row justify-content-center">
                <?php if($img != null){?>
                    <img class="rounded-circle profile-picture img-fluid" src="data:<?php echo $imageTypeP?>;base64, <?php echo $img ?>" alt='post_photo'>
                <?php }else{?>
                    <img class="rounded-circle profile-picture img-fluid" src="./img/profile-picture.jpg" height="150" width="150">
                <?php } ?>
                
                </div>
                <div class="row justify-content-center">
                    <h4 class="text-center"><?php echo $profileData[1].' '. $profileData[2]?></h4>
                </div>
                <br>
                <div class="row justify-content-center">
                    <div class="col personal-info">
                        <div class="row justify-content-center">
                            <h6 class="text-center">Te dhenat personale</h6>
                        </div>
                        <div class="row">
                            <ul>
                                <li><i class="fa fa-envelope-o" aria-hidden="true"></i><?php echo ' '. $userData[2];?></li>
                                <li><i class="fa fa-calendar-o" aria-hidden="true"></i><?php echo ' '.$profileData[3]?></li>
                                <li><?php echo $userData[5]?></li>
                                <li> <i class="fa fa-thumb-tack" aria-hidden="true"></i> <?php echo ' '. $profileData[6]?></li>
                                <li>
                                <br>
                                    <a href="./edit-profile.php?userid=<?php echo $profileData[0]?>" style="text-decoration: none;">
                                        <button class="btn edit-post"> <i class="fa fa-edit" aria-hidden="true"></i>    Modifiko Profilin</button>
                                    </a>
                                </li>
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
                            $finfo    = new finfo(FILEINFO_MIME);
                            $mimeType = $finfo->buffer($postValue[3]);
                            $imageType = strstr($mimeType, ';', true);
                            $img = get_photo_byID($postId);
                            $image = $img[0];
                          
                        ?>
                        <div class="row single-post">
                            <div class="col-8 description">
                                <a href="./single-post.php?id=<?php echo $postId?>"> 
                                    <h3 class=""><?php echo $title?></h3>
                                    <?php echo $description?>
                                </a>
                                <br>
                                <br>
                                    <a href="./edit-post.php?postid=<?php echo $postId.'&userId='.$userData[0]?>">
                                        <button class="btn edit-post"> <?php echo $modifikoPostin?> </button>
                                    </a>
                                    <button class="btn edit-post" name="deletePost" type="submit" >Fshi </button>
                            </div>
                            <div class="col-4">
                                <!-- <img src="getImage.php?id=<?php echo $postId?>" class="img-responsive" /> -->
                                <img class="img-fluid" src="data:<?php echo $imageType?>;base64, <?php echo $image ?>" alt='post_photo'>
                            </div>
                            
                        </div>
                        <?php } 
                    }else {?>
                    <br>
                    <br>
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