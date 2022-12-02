<?php 

session_start();

if (isset($_POST['jelo_dugme'])) {

    if (isset($_SESSION['korpa'])) {
        $jela_ids = array_column($_SESSION['korpa'], 'jelo_id');
        if (!in_array($_POST['jelo_id'], $jela_ids)) {
            $cena = $_POST['kolicina'] * $_POST['cena'];
            $_SESSION['korpa'][$_POST['jelo_id']] = array(
                'jelo_id' => $_POST['jelo_id'],
                'jelo_naziv' => $_POST['jelo_naziv'],
                'kolicina' => $_POST['kolicina'],
                'cena' => $cena
            );

            header('location: naruci.php');    
        } else {
            echo '<script>alert("Jelo je vec dodato"); location.href="naruci.php";</script>';
        }
    } else {
        $cena = $_POST['kolicina'] * $_POST['cena'];
        $_SESSION['korpa'][$_POST['jelo_id']] = array(
            'jelo_id' => $_POST['jelo_id'],
            'jelo_naziv' => $_POST['jelo_naziv'],
            'kolicina' => $_POST['kolicina'],
            'cena' => $cena
        );

        header('location: naruci.php');
    }

} else {
    header('location: index.php');
}

?>