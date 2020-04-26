<?php require_once('includes/header.php')?>
<?php require_once('includes/navbar.php')?>

    <div class="container">
        <div class="row">
            <div class="col-8 col-lg-6 m-auto">
                <div class="card bg-light mt-5 py-2">
                    <div class="card-title">
                        <h2 class="text-center">Vendosni kodin</h2>

                        <?php 
                            validate_code() 
                        ?>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <input type="text" name="recover-code" placeholder="########" class="form-control py-2 mb-2">
                            <input type = "submit" value="Dërgo kodin" />
                        </form>    
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-danger float-left">Anullo</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once('includes/footer.php')?>