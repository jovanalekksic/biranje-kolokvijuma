<?php

require "dbBroker.php";
require "model/user.php";

session_start();
if (isset($_POST['username']) && isset($_POST['password'])) { //ako je poslat POST zahtev u koji je upisan username i ako je poslat password; ja hocu da kreiram tog User-a i da ga ulogujem
    $uname = $_POST['username'];
    $upass = $_POST['password'];

    //kreiramo korisnika
    //$conn = new mysqli();
    $korisnik = new User(1, $uname, $upass);
    // $odgovor=$korisnik->logInUser($uname, $upass, $conn);
    $odgovor = User::logInUser($korisnik, $conn);  //pristup staticke f-je preko klase

    //u slucaju da je odgovor pozitivan, hocemo da nas odevede na home.php stranicu

    if ($odgovor->num_rows == 1) { //ako mi se vratio 1 korisnik hocu da se ulogujem
        echo `
        <script>
        console.log("Uspesno ste se prijavili!");
        </script>
        `;

        $_SESSION['user_id'] = $korisnik->id;
        header('Location: home.php');
        exit();
    } else {
        echo  `
        <script>
        console.log("Niste ste se prijavili!");
        </script>
        `;
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>FON: Zakazivanje kolokvijuma</title>

</head>

<body>
    <div class="login-form">
        <div class="main-div">
            <form method="POST" action="#">
                <!-- POST obuhvata sva input polja (i button se racuna) i hvata njihove nazive -->
                <div class="container">
                    <label class="username">Korisnicko ime</label>
                    <input type="text" name="username" class="form-control" required>
                    <br>
                    <label for="password">Lozinka</label>
                    <input type="password" name="password" class="form-control" required>
                    <button type="submit" class="btn btn-primary" name="submit">Prijavi se</button>
                </div>

            </form>
        </div>


    </div>
</body>

</html>