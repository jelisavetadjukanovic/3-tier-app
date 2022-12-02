<?php 

    if (isset($_POST['prihvatanje_politike_dugme'])) {
        setcookie('POLITIKA', 'prihvacena', strtotime( '+1 year' ));
        header('location: index.php');
    } else {
        header('location: index.php');
    }

?>