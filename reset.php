<?php require_once('includes/header.php')?>
<?php require_once('includes/navbar.php')?>

    <div class="container">
        <div class="row">
            <div class="col-8 col-lg-6 m-auto">
                <div class="card bg-light mt-5 py-2">
                    <div class="card-title">
                        <h2 class="text-center">Vendosni kodin</h2>
                    </div>
                    <div class="card-body">
                        <input type="password" name="reset-password" placeholder="Fjalëkalim" class="form-control py-2 mb-2">
                        <input type="password" name="creset-password" placeholder="Konfirmo Fjalëkalim" class="form-control py-2 mb-2">
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-danger float-left">Anullo</button>
                        <button class="btn btn-success float-right">Dërgo fjalëkalim</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once('includes/footer.php')?>