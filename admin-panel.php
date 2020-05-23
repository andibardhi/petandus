<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Pet&Us - Paneli i Adminit</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/header-style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style>
        .btn{
            font-size: 10px;
            padding: 4px;
        }        

        .buttons{
            margin-top:10px;
        }

        .single{
            margin-top:10px;
            border:1px solid black;
            border-radius:5px;
            cursor:pointer;
            padding: 22px;
        }
    </style>
</head>

<body>
    <?php
        include_once('./includes/navbar.php');
        include_once('functions/config.php'); 
        include_once('functions/admin.php'); 
        $con = mysqli_connect("localhost","root","","petus");
        if(isset($_SESSION['role'])){
            if($_SESSION['role']=='U'){
                header("Location: ./index.php");
            }
        }else{
            header("Location: ./index.php");
        }
        
    ?>
    <div class="container">
        <div class="row buttons">
            <div class="col-4">
                <div class="row justify-content-center">
                    <div class="">Postet</div>
                </div>
                <?php
                $sql = "SELECT * FROM POST";
                $result = mysqli_query($con,$sql);
                while($row = $result->fetch_assoc()) {
                    
                ?>
                <div class="col single">
                    <div class="row"><?php echo $row['titull'] ?></div>
                    <div class="row"><?php echo $row['pershkrim'] ?></div>
                    <button onclick="fshipost(<?php echo $row['id'] ?>)" class="btn btn-danger">Fshi post</button>
                </div>
                <?php                    
                }   
                ?>
            </div>
            <div class="col-4">
                <div class="row justify-content-center">
                    <div class="">Bloget</div>
                </div>
                <?php
                    $sql = "SELECT * FROM BLOG";
                    $result = mysqli_query($con,$sql);
                    while($row = $result->fetch_assoc()) {
                        
                    ?>
                    <div class="col single">
                        <div class="row"><?php echo $row['titull'] ?></div>
                        <div class="row"><?php echo $row['pershkrim'] ?></div>
                        <button onclick="fshiblog(<?php echo $row['id'] ?>)" class="btn btn-danger">Fshi blog</button>
                    </div>
                <?php                    
                }   
                ?>
            </div>
            <div class="col-4">
                <div class="row justify-content-center">
                    <div class="">Perdorues</div>
                </div>
                <?php
                $sql = "SELECT * FROM USER";
                $result = mysqli_query($con,$sql);
                while($row = $result->fetch_assoc()) {
                    
                ?>
                <div class="col single">
                    <div class="row"><?php echo $row['username'] ?></div>
                    <div class="row"><?php echo $row['email'] ?></div>

                    <?php
                        if($row['role']=='F'){
                    ?>
                    <button onclick="aktivizoperdorues(<?php echo $row['id'] ?>)" class="btn btn-success">Aktivizo perdorues</button>
                    <?php
                        }else{
                    ?>
                    <button onclick="caktivizoperdorues(<?php echo $row['id'] ?>)" class="btn btn-danger">Caktivizo perdorues</button>
                    <?php
                        }
                    ?>


                    <?php
                        if($row['role']=='U'){
                    ?>
                    <button onclick="bejadmin(<?php echo $row['id'] ?>)" class="btn btn-success">Bej admin</button>
                    <?php
                        }
                        else if($row['role']=='A'){
                    ?>
                    <button onclick="hiqadmin(<?php echo $row['id'] ?>)" class="btn btn-danger">Hiq admin</button>
                    <?php  
                        }
                    ?>
                </div>
                <?php                    
                }   
                ?>
            </div>
        </div>
    </div>
    <script>
        function fshipost(id){
            if(confirm('Jeni i sigurte qe doni te fshini kete post?')){
                $.post('./functions/admin.php', {id:id, action:'delete-post'}, function (response) {
                    if(response=='success'){
                        location.reload();
                    }
                    else{
                        alert(response);
                    }
                });
            }
        }
        function fshiblog(id){
            if(confirm('Jeni i sigurte qe doni te fshini kete blog?')){
                $.post('./functions/admin.php', {id:id, action:'delete-blog'}, function (response) {
                    if(response=='success'){
                        location.reload();
                    }
                    else{
                        alert(response);
                    }
                });
            }
        }
        function caktivizoperdorues(id){
            if(confirm('Jeni i sigurte qe doni te caktivizoni kete perdorues?')){
                $.post('./functions/admin.php', {id:id, action:'deactivate-user'}, function (response) {
                    if(response=='success'){
                        location.reload();
                    }
                    else{
                        alert(response);
                    }
                });
            }
        }

        function aktivizoperdorues(id){
            if(confirm('Jeni i sigurte qe doni te aktivizoni kete perdorues?')){
                $.post('./functions/admin.php', {id:id, action:'activate-user'}, function (response) {
                    if(response=='success'){
                        location.reload();
                    }
                    else{
                        alert(response);
                    }
                });
            }
        }

        function bejadmin(id){
            if(confirm('Jeni i sigurte qe doni te beni kete perdorues admin?')){
                $.post('./functions/admin.php', {id:id, action:'make-admin'}, function (response) {
                    if(response=='success'){
                        location.reload();
                    }
                    else{
                        alert(response);
                    }
                });
            }
        }

        function hiqadmin(id){
            if(confirm('Jeni i sigurte qe doni te hiqni rolin e adminit nga ky perdorues?')){
                $.post('./functions/admin.php', {id:id, action:'remove-admin'}, function (response) {
                    if(response=='success'){
                        location.reload();
                    }
                    else{
                        alert(response);
                    }
                });
            }
        }
    </script>
</body>
</html>