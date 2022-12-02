<?php

include('db.php');

$statement = $connection->prepare('SELECT id, datum_porudzbine, UPPER(adresa) as adresa, iznos FROM porudzbina where isporucena = 0;');

$statement->execute();

$porudzbine = $statement->get_result();

?>