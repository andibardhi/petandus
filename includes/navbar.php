<header> 
            <div class="header">
                <a href="./index.php" class="logo"> PETS&US </a>
                <div class="header-right">
                    <a class="active" href="#">Posts</a>
                    <a href="#">Blog</a>
                    <?php 
                        if(isset($_SESSION['username']) OR isset($_COOKIE['username'])){
                    ?>
                    <a href="./logout.php" id="logreg">Logout </a> 
                    <a href="#" id="logreg"> Profile </a> 
                    <?php  
                        }else{
                    ?>
                    <a href="./login.php" id="logreg">Login </a>
                    <a href="./register.php" id="logreg">Register</a>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </header>