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
    if(isset($_GET['username']) || isset($_SESSION['username']) ){
        ini_set("display_errors", 0);
        $data = getUserPosts();
        $profileData = getDataFromProfile();
        $ffinfo    = new finfo(FILEINFO_MIME);
        $mimeTypeP = $ffinfo->buffer($profileData[4]);
        $imageTypeP = strstr($mimeTypeP, ';', true);
        $userData = getDataFromUser();
        $amI = true;
        $deleteP = deletePostById(14);
        
        if(isset($_GET['username']) &&($_GET['username'] != $userData[1])){
            $amI = false;

            $_data =  getUserPostsByUserID(_getUserIDbyUsername($_GET['username']));
        } 
        $img = base64_encode($profileData[4]);
        ?>
        <br>
        <div class="container">
            <div class="row justify-content-around" id="main">
                <div class="col-md-3">
                    <?php if($amI && $_SESSION['username'] != null){?> 

                        <div class="row justify-content-center">
                            <?php if(strlen($img[0]) > 0){ ?>
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
                                        <?php if($amI){?>
                                            <br>
                                                <a href="./edit-profile.php" style="text-decoration: none;">
                                                    <button class="btn edit-post"> <i class="fa fa-edit" aria-hidden="true"></i>    Modifiko Profilin</button>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>

                                </div>
                            </div>
                        </div>

                    <?php }else{ 
                        $_userData = _getUserByID(_getUserIDbyUsername($_GET['username']));
                        $_profileData = _getProfileByID(_getUserIDbyUsername($_GET['username']));
                        $__ffinfo    = new finfo(FILEINFO_MIME);
                        $__mimeTypeP = $__ffinfo->buffer($_profileData[4]);
                        $__imageTypeP = strstr($__mimeTypeP, ';', true);
                        $__img = base64_encode($_profileData[4]);
                            
                        ?>
                        <div class="row justify-content-center">
                            <?php if(strlen($__img[0]) > 0){ ?>
                                <img class="rounded-circle profile-picture img-fluid" src="data:<?php echo $__imageTypeP?>;base64, <?php echo $__img ?>" alt='post_photo'>
                            <?php }else{?>
                                <img class="rounded-circle profile-picture img-fluid" src="./img/profile-picture.jpg" height="150" width="150">
                            <?php } ?>
                        
                        </div>
                        <div class="row justify-content-center">
                            <h4 class="text-center"><?php echo $_profileData[1].' '. $_profileData[2]?></h4>
                        </div>
                        <br>
                        <div class="row justify-content-center">
                            <div class="col personal-info">
                                <div class="row justify-content-center">
                                    <h6 class="text-center">Te dhenat personale</h6>
                                </div>
                                <div class="row">
                                    <ul>
                                        <li><i class="fa fa-envelope-o" aria-hidden="true"></i><?php echo ' '. $_userData[2];?></li>
                                        <li><i class="fa fa-calendar-o" aria-hidden="true"></i><?php echo ' '.$_profileData[3]?></li>
                                        <li><?php echo $_userData[5]?></li>
                                        <li> <i class="fa fa-thumb-tack" aria-hidden="true"></i> <?php echo ' '. $_profileData[5]?></li>
                                        <li>
                                    
                                    </ul>

                                </div>
                            </div>
                        </div>
                    <?php }?>
                </div>
                <div class="col-md-8">
                    <?php if($amI){?>   
                        <?php if ($_SESSION['username'] != null){?>
                            <a href="./new-post.php" class="btn create-post"> <i class="fa fa-plus-circle"></i> Krijo post </a>
                            <br>
                            <br>
                            <div class="alert alert-success" id="successDelete" role="alert">
                                <h3>
                                    Postimi u fshi me sukses!
                                </h3>
                            </div>
                            <div class="alert alert-danger" id="deleteError" role="alert">
                                Postimi nuk u fshi!
                            </div>
                           
                            <script> $("#successDelete").hide();</script>
                            <script> $("#deleteError").hide();</script>
                        <?php } ?> 
                        <div class="row justify-content-center">
                            <?php if(count($data)>0){
                                foreach ($data as $postValue){
                                    $title = $postValue[1];
                                    $description = $postValue[2];
                                    $postId = $postValue[0];
                                    $modifikoPostin = "Modifiko";
                                    $finfo    = new finfo(FILEINFO_MIME);
                                    $mimeType = $finfo->buffer($postValue[3]);
                                    $imageType = strstr($mimeType, ';', true);
                                    $img = get_photo_byID($postId);
                                    $image = $img[0];
                                
                                ?>
                                <div class="row single-post" id="post-id-<?php echo $postId?>"> 
                                    <div class="col-8 description d-flex align-items-start flex-column bd-highlight">
                                        <a class="mb-auto bd-highlight" href="./single-post.php?id=<?php echo $postId?>"> 
                                            <h3 class=""><?php echo $title?></h3>
                                            <?php 
                                                if(strlen($description)<=100){
                                                    echo $description;
                                                }else{
                                                    $newString = substr( $description , 0 ,96).' ...';  
                                                    echo $newString;
                                                }
                                            ?>
                                        </a>
                                        <br>
                                        <br>
                                        <?php if($amI && $_SESSION['username'] != null){?>
                                        <div class="row  bd-highlight">
                                            <div class="col-6">
                                                <a href="./edit-post.php?postid=<?php echo $postId.'&userId='.$userData[0]?>">
                                                    <button class="btn edit-post"> <?php echo $modifikoPostin?> </button>
                                                </a>
                                            </div>
                                            <div class="col-6">
                                                <form action="profile.php" method="POST">
                                                    <?php $deletePostName = 'deletePost'.$postId ?>
                                                    <button class="btn edit-post" value="click" name="<?php echo $deletePostName?>" type="submit" >Fshi </button>
                                                </form>
                                            </div>
                                        </div>
                                        <?php 
                                            if(isset($_POST[$deletePostName])){

                                                $deleteSuccess = deletePostById($postId); 
                                                if($deleteSuccess){?>
                                                    <script>
                                                        $("#successDelete").show();
                                                        $("#post-id-<?php echo $postId?>").hide();
                                                        setTimeout(function(){
                                                            location.reload();
                                                        }, 3000);
                                                    </script>
                                                    <!-- <?php
                                                    // header('Location: '.$_SERVER['REQUEST_URI']);
                                                    
                                                    ?> -->
                                                <?php } else { ?>
                                                    <script> $("#deleteError").hide();</script>

                                                <?php } ?>
                                            <?php } ?>
                                        <?php }?>
                                    </div>
                                    <div class="col-4">
                                    <?php 
                                    if(strlen($img[0]) > 0){ ?>
                                        <img class="img-fluid" src="data:<?php echo $imageType?>;base64, <?php echo $image ?>" alt='post_photo'>
                                    <?php }else {?>
                                        <img src="img/empty.jpg" class="img-fluid" />
                                    <?php } ?>
                                    </div>
                                </div>
                                <?php } 
                            }else {?>
                            <br>
                            <br>
                                <h1 style="margin-top: 2em">Ju akoma nuk keni krijuar postime!</h1>
                            <?php }?>
                        </div>
                    <?php }else {?>
                        <div class="row justify-content-center">
                            <?php if(count($_data)>0){
                                foreach ($_data as $_postValue){
                                    $_title = $_postValue[1];
                                    $_description = $_postValue[2];
                                    $_postId = $_postValue[0];
                                    $_modifikoPostin = "Modifiko Postimin";
                                    $_finfo    = new finfo(FILEINFO_MIME);
                                    $_mimeType = $_finfo->buffer($_postValue[3]);
                                    $_imageType = strstr($_mimeType, ';', true);
                                    $_img = get_photo_byID($_postId);
                                    $_image = $_img[0];
                                
                                ?>
                                <div class="row single-post">
                                    <div class="col-8 description">
                                        <a href="./single-post.php?id=<?php echo $_postId?>"> 
                                            <h3 class=""><?php echo $_title?></h3>

                                            <?php 
                                                if(strlen($_description)<100){
                                                    echo $_description;
                                                }else{
                                                    $_newString = substr($_description , 0 ,96).' ...'; 
                                                    echo $_newString;
                                                }
                                            ?>
                                        </a>
                                        <br>
                                        <br>
                                
                                    </div>
                                    <div class="col-4">
                                    <?php
                                    
                                    if(strlen($_img[0]) > 0) { ?>
                                        <img class="img-fluid" src="data:<?php echo $_imageType?>;base64, <?php echo $_image ?>" alt='post_photo'>
                                    <?php }else {?>
                                        <img src="img/empty.jpg" class="img-fluid" />
                                    <?php } ?>
                                    </div>
                                    
                                </div>
                                <?php } 
                            }else {?>
                            <br>
                            <br>
                                <h1 style="margin-top: 2em">Ju akoma nuk keni krijuar postime!</h1>
                            <?php }?>
                        </div>
                    <?php }?>
                </div>

            </div>
        </div>
    <?php }
    else{
        header("Location: ./index.php");
    }
    
    ?>

    <?php
    include_once('./includes/footer.php');
    ?>
    <script>
        // $("$deletePost").click
    </script>
</body>

</html>