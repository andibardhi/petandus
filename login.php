<?php require_once('includes/header.php')?>
<?php require_once('includes/navbar.php')?>    

    <div class="container">
        <div class="row">
            <div class="col-8 col-lg-6 m-auto">
                <div class="card bg-light mt-5 py-2">
                    <div class="card-title">
                        <?php 
                            display_message();
                            login_validation();
                        ?>
                        <h2 class="text-center">Login</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <input type="text" name="username" placeholder="Username" class="form-control py-2 mb-2">
                            <input type="password" name="password" placeholder="Fjalëkalimi" class="form-control py-2 mb-2">
                            <button class="btn btn-success float-right">Login</button>
                            <input type="checkbox" name="remember"> <label for="remember">Më mbaj mend</label>
                        </form>
                    </div>
                    <div class="card-footer">
                        <span>Keni harruar fjalëkalimin? </span><a href="recover.php">Shtyp këtu</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once('includes/footer.php')?>