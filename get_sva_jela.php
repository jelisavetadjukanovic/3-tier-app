<?php

include('db.php');

$statement = $connection->prepare('SELECT * FROM jelo;');

$statement->execute();

$jela = $statement->get_result();

?>