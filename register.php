<?php require_once('includes/header.php')?>
<?php require_once('includes/navbar.php')?>    

    <div class="container">
        <div class="row">
            <div class="col-8 col-lg-6 m-auto">
                <div class="card bg-light mt-5 py-2">
                    <div class="card-title">
                        <h2 class="text-center">Forma e Regjistrimit</h2>
                    </div>
                    <div class="card-body">
                        <!--Here we call user_validation function -->
                        <?php register_validation(); ?>
                        <form method="POST" autocomplete="on">
                            <input type="text" name="firstname" placeholder="Emri" class="form-control py-2 mb-2">
                            <input type="text" name="lastname" placeholder="Mbiemri" class="form-control py-2 mb-2">
                            <input type="date" name="birthdate" placeholder="Datëlindja" class="form-control py-2 mb-2">
                            <input type="text" name="phonenumber" placeholder="Numër telefoni" class="form-control py-2 mb-2">
                            <select name="city" class="form-control py-2 mb-2">
                                <option value="null" selected disabled>Qyteti</option>
                                <option value="tirane">Tirane</option>
                                <option value="durres">Durres</option>
                                <option value="korce">Korce</option>
                                <option value="vlore">Vlore</option>
                            </select>
                            <input type="text" name="username" placeholder="Username" class="form-control py-2 mb-2">
                            <input type="text" name="email" placeholder="Email" class="form-control py-2 mb-2">
                            <input type="password" name="password" placeholder="Fjalëkalimi" class="form-control py-2 mb-2">
                            <input type="password" name="cpassword" placeholder="Konfirmim Fjalëkalimi" class="form-control py-2 mb-2">
                            <button class="btn btn-success ml-auto">Regjistrohu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once('includes/footer.php')?>