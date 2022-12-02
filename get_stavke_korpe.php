<?php 

session_start();

$stavke_korpe = [];

echo $_SESSION;
if (isset($_SESSION['korpa'])) {
    $stavke_korpe = $_SESSION['korpa'];
}

?>