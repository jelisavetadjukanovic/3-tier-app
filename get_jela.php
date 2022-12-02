<?php

include('db.php');

$statement = $connection->prepare('SELECT jelo.id as jelo_id, jelo.naziv as jelo_naziv, cena, kategorija.naziv as kategorija_naziv FROM jelo INNER JOIN kategorija ON jelo.kategorija_id = kategorija.id');

$statement->execute();

$jela = $statement->get_result();

$kategorije = array();

while($row = $jela->fetch_assoc()) {
    if (array_key_exists($row['kategorija_naziv'], $kategorije)) 
    {
        $kategorije[$row['kategorija_naziv']][$row['jelo_id']] = $row;
    } else 
    {
        $kategorije[$row['kategorija_naziv']] = array();
        $kategorije[$row['kategorija_naziv']][$row['jelo_id']] = $row;
    }
}

// echo '<pre>'; print_r($kategorije); echo '</pre>';

?>