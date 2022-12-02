<?php 

include('db.php');

if (isset($_POST['registracija_dugme'])) {

    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $korisnicko_ime = $_POST['korisnicko_ime'];
    $lozinka = $_POST['lozinka'];
    $lozinka_potvrda = $_POST['lozinka_potvrda'];
    
    if ($lozinka != $lozinka_potvrda) {
        header('location: registracija_stranica.php?greska=Lozinke se ne poklapaju');
        return;    
    }

    try {
        $statement = $connection->prepare("INSERT INTO korisnik (ime, prezime, korisnicko_ime, lozinka) VALUES (?, ?, ?, ?); ");
        $statement->bind_param("ssss", $ime, $prezime, $korisnicko_ime, $lozinka);
        $statement->execute();
    } catch (Exception $e) {
        header('location: registracija_stranica.php?greska=Korisnicko ime vec postoji');
        return;    
    }

    header('location: index.php?poruka=Uspesna registracija');

} else {
    header('location: index.php');
}

?>