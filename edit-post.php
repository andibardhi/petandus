<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Krijoni post</title>
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
    ?>
    <br>
    <div class="container">
                <form class="form">
                    <h1>Modifikoni post</h1>
                    <label for="email">Titull:</label>
                    <input type="text" class="form-control" id="title" value="Lorem Ipsum"  name="title">
                    <label for="description">Pershkrim:</label>
                    <textarea id="description" rows="4" cols="50">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</textarea>
                    <label for="phonenumber" >Nr i kontaktit:</label>
                    <input type="text" class="form-control" id="phonenumber" value="068XXXXXXX" name="phonenumber">
                    <label for="email">Emaili i kontaktit:</label>
                    <input type="text" class="form-control" id="email" value="emermbiemer@gmail.com" name="email">
                    <label for="city">Qyteti:</label>
                    <select class="custom-select" name="city" id="city">
                        <option value="tirane" selected>Tirane</option>
                        <option value="durres">Durres</option>
                        <option value="korce">Korce</option>
                        <option value="vlore">Vlore</option>
                    </select>
                    <label for="animal">Kafsha:</label>
                    <select class="custom-select" name="animal" id="animal">
                        <option value="qen" selected>Qen</option>
                        <option value="mace">Mace</option>
                        <option value="peshk">Peshk</option>
                        <option value="kavje">Kavje</option>
                    </select>
                    <label for="category">Kategoria:</label>
                    <select class="custom-select" name="category" id="category">
                        <option value="petsitting" selected>Pet sitting</option>
                        <option value="adoptim">Adoptim</option>
                        <option value="petcare">Kujdese</option>
                        <option value="lajmerim">Lajmerim</option>
                    </select>
                    <br>
                    <div class="row justify-content-center">
                        <button class="btn btn-primary text-center" type="button">Konfirmo</button>
                    </div>
                    <br>
                </form>   
    </div>
    <?php
    include_once('./includes/footer.php');
    ?>
</body>

</html>