<?php

include('db.php');

$statement = $connection->prepare('SELECT * FROM porudzbina where isporucena = 0 ORDER BY datum_porudzbine DESC;');

$statement->execute();

$porudzbine = $statement->get_result();

?>