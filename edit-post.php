<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Modifiko Postim</title>
    <title>Edito post</title>
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
    ini_set("display_errors", 0);
    $post = getPost();
    $postId = $post[0];
    $postTitle = $post[1];
    $postDescription = $post[2];
    $postImageBlob = $post[3];
    $phoneNr = $post[9];
    $email = $post[10];

    $category = getDataById($post[6], "kategori", "emer");
    $city=getDataById($post[8], "qytet", "emer");
    $animal =getDataById($post[7], "kafshe", "emer"); 
    
    $allCategories = getAllData("emer","kategori");
    $allCities = getAllData("emer","qytet");

    
    $allAnimals = getAllData("emer","kafshe");
    
    $finfo    = new finfo(FILEINFO_MIME);
    $mimeType = $finfo->buffer($postImageBlob);
    $imageType = strstr($mimeType, ';', true);
    $img = get_photo_byID($postId);
    $image = $img[0];

    $userId = $_GET['userId'];
    $postID = $_GET['postid'];
    ?>
    <br>
    <div class="container">
             
                <form class="form" method="POST" enctype="multipart/form-data">
                    <h1>Modifikoni post</h1>
                    <div class="alert alert-success" id="successUpdate" role="alert">
                        <h5>
                            Postimi u modifikua me sukses!
                        </h5>
                        <script> $("#successUpdate").hide();</script>

                    </div>
                    <label for="email">Titull:</label>
                    <input type="text" class="form-control" id="title" value="<?php echo $postTitle?>"  name="title">
                    <div class="row">
                        <div class="col-6">
                            <label for="description">Pershkrim:</label>
                            <textarea id="description" rows="4" cols="20" name="description"><?php echo $postDescription?></textarea>
                        </div>
                        <div class="col-6">
                            <img src="data:<?php echo $imageType?>;base64, <?php echo $image ?>" alt='post_photo' class="img-fluid">
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="imazhi">Ndrysho foton</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="file"  name="image[]" id="image" accept=".jpg, .png, .jpeg">
                                    <!-- <input type="file" name="image" required>     -->
                                    <!-- <input type="file" name = "image" required> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <label for="phonenumber" >Nr i kontaktit:</label>
                    <input type="text" class="form-control" id="phonenumber" value="<?php echo $phoneNr ?>" name="phonenumber">
                    <label for="email">Emaili i kontaktit:</label>
                    <input type="text" class="form-control" id="email" value="<?php echo $email ?>" name="email">
                    <label for="city">Qyteti:</label>
                    <select class="custom-select" name="city" id="city" value="<?php echo $city;?>">
                        <?php
                        // var_dump($city[0][0]);
                        // exit();
                        _printList($allCities, $city[0][0]) ?>
                    </select>
                    <label for="animal">Kafsha:</label>
                    <select class="custom-select" name="animal" id="animal" value="<?php echo $animal?>">
                        <?php _printList($allAnimals, $animal[0][0]) ?>

                    </select>
                    <label for="category">Kategoria:</label>
                    <select class="custom-select" name="category" id="category" value="<?php echo $category?>">
                        <?php _printList($allCategories, $category[0][0]) ?>
                       
                    </select>
                    <br>
                    <div class="row justify-content-center">
                        <button class="btn btn-primary text-center" type="submit" name="editPost" type="button">Konfirmo</button>
                    </div>
                    <br>
                </form>   
    </div>

    <?php
    if(isset($_POST['editPost'])){
        
        $image_file = addslashes(file_get_contents($_FILES["image"]["tmp_name"][0]));
        if(strlen($image_file) > 0 ){
            $updatePostResult =  updatePost($userId,$postId, $image_file);
        }else {
            $updatePostResult =  updatePost($userId,$postId, $postImageBlob);
        }
        
        if($updatePostResult){?>
            <script>
                $("#successUpdate").show();
            </script>
        <?php
        echo "<meta http-equiv='refresh' content='0'>";
        }
    }

    include_once('./includes/footer.php');
    ?>
</body>

</html>