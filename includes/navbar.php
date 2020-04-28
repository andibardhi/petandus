<nav class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container">
            <a href="index.php" class="navbar navbar-brand"><h3>Pet&Us</h3></a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="nav-link">Posts</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Blog</a>
                </li>
                <?php 
                    if(isset($_SESSION['username']) OR isset($_COOKIE['username'])){
                 ?>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link">Logout</a>
                </li>
                <?php  
                    }else{
                ?>
                <li class="nav-item">
                    <a href="login.php" class="nav-link">Login</a>
                </li>
                <li class="nav-item">
                    <a href="register.php" class="nav-link">Register</a>
                </li>
                <?php
                    }
                ?>
            </ul>
        </div>
    </nav>