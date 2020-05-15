<header> 
    <div class="header">
        <a href="./index.php" class="logo"> PET&US </a>

        <div class="header-right">
        <a href="./index.php">Kryefaqja</a>
            <a class="active" href="./posts.php">Postime</a>
            <a href="./blog.php">Blog</a>
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