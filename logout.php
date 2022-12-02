<?php 

session_start();

if (isset($_POST['logout_dugme'])) {
    unset($_SESSION['korisnik_id']);
    unset($_SESSION['korisnik_ime']);
    unset($_SESSION['korisnik_prezime']);
    header('location: index.php');
} else {
    header('location: index.php');
}

?>