<?php

include('db.php');

$sql = file_get_contents('babin_lonac.sql');

$qr = $connection->multi_query($sql);

?>