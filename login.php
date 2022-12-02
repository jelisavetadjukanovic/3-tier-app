<?php 

session_start();

if (isset($_POST['login_dugme'])) {
    include('db.php');

    $statement = $connection->prepare('SELECT id, ime, prezime, korisnicko_ime, lozinka from korisnik WHERE korisnicko_ime=? and lozinka=? ;');
    $statement->bind_param('ss', $_POST['korisnicko_ime'], $_POST['lozinka']);
    if ($statement->execute()) {
        $statement->bind_result($korisnik_id, $korisnik_ime, $korisnik_prezime, $korisnik_korisnicko_ime, $korisnik_lozinka);
        $statement->store_result();

        if ($statement->num_rows() == 1) {
            $statement->fetch();
            
            $_SESSION['korisnik_id'] = $korisnik_id;
            $_SESSION['korisnik_ime'] = $korisnik_ime;
            $_SESSION['korisnik_prezime'] = $korisnik_prezime;
            header('location: index.php?poruka=Uspesan login!');
        } else {
            header('location: login_stranica.php?greska=Korisnicko ime ili lozinka nisu ispravni!');   
        }
    } else {
        header('location: login_stranica.php?greska=Korisnicko ime ili lozinka nisu ispravni!');   
    }
} else {
    header('location: index.php');
}

?>