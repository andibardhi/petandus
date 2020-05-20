<?php
include_once('./functions/config.php');
?>
<header> 
    <div class="header">
        <a href="./index.php" class="logo"> PET&US </a>

        <div class="header-right">
            <?php 
                if(isset($_SESSION['role']) && $_SESSION['role']=='A'){
            ?>
            <a href="./admin-panel.php">Paneli Adminit</a>
            <?php
            }
            ?>
            <a href="./index.php" <?php if (stripos($_SERVER['REQUEST_URI'],'index.php') !== false) {echo 'class="active"';} ?> >Kryefaqja</a>
            <a  <?php if (stripos($_SERVER['REQUEST_URI'],'posts.php') !== false) {echo 'class="active"';} ?> href="./posts.php">Postime</a>
            <a href="./blog.php" <?php if (stripos($_SERVER['REQUEST_URI'],'blog.php') !== false) {echo 'class="active"';} ?> >Blog</a>
            <?php 
                if(isset($_SESSION['username']) OR isset($_COOKIE['username'])){
            ?>
            <a href="./profile.php" id="logreg"> Profili </a> 
            <a href="./logout.php" id="logreg">Dil </a> 
            <?php  
                }else{
            ?>
            <a href="./login.php" id="logreg">Logohu </a>
            <a href="./register.php" id="logreg">Regjistrohu</a>
            <?php
                }
            ?>
        </div>
    </div>
</header>