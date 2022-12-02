<?php 

session_start();

include('db.php');

if (isset($_POST['potvrdi_isporuku_dugme'])) {

    $statement = $connection->prepare("UPDATE porudzbina SET isporucena = 1 where id = ?; ");
    $statement->bind_param("i", $_POST['porudzbina_id']);
    $statement->execute();
} 

header('location: neisporucene_porudzbine.php');

?>