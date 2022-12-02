<?php 

session_start();

include('db.php');

if (isset($_POST['potvrdi_porudzbinu_dugme'])) {

    if (isset($_SESSION['korpa'])) {

        $iznos = 0;

        foreach ($_SESSION['korpa'] as $key => $value) {
            $iznos += $value['cena'];
        }

        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
        $adresa = $_POST['adresa'];

        if ($ime == '' or $prezime == '' or $adresa == '') {
            header('location: pregled_porudzbine.php?greska=Niste uneli sve podatke');
            return;    
        }

        $statement = $connection->prepare("INSERT INTO porudzbina (adresa, iznos) VALUES (?, ?); ");
        $statement->bind_param("si", $adresa, $iznos);
        $statement->execute();

        $porudzbina_id = $statement->insert_id;

        foreach ($_SESSION['korpa'] as $key => $value) {
            $statement = $connection->prepare("INSERT INTO stavka_porudzbine (porudzbina_id, kolicina, proizvod_id, cena) VALUES (?, ?, ?, ?); ");
            $statement->bind_param("iiii", $porudzbina_id, $value['kolicina'], $value['jelo_id'], $value['cena']);
            $statement->execute();
        }

        unset($_SESSION["korpa"]);

        header('location: hvala_na_kupovini.html');
    } else {
        echo '<script>alert("Niste izabrali nijedno jelo"); location.href="naruci.php";</script>';

        header('location: naruci.php');
    }

} else {
    header('location: index.php');
}

?>