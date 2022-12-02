<?php 
    session_start();
    if (!isset($_SESSION['korisnik_id'])) {
        header('location: login_stranica.php');        
    }
?>

<!DOCTYPE html>
<html>

<head>
      <meta charset="utf-8">
      <title> Babin lonac </title>
	  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<div class="header">
  <h1>BABIN LONAC</h1>
  <p>DOGAĐAJI & KETERING</p>
</div>

<body>

<!-- Meni sekcija -->
<ul>
  <li><a href="/babin-lonac/">Naslovna</a></li>
  <li><a href="kuvar.html">Ko kuva za vas?</a></li>
  <li><a href="meni.php">Meni</a></li>
  <li><a href="naruci.php">Naruči</a></li>
  <li><a href="login_stranica.php">Login</a></li>
  <li><a href="neisporucene_porudzbine.php">Neisporučene porudžbine</a></li>
  <li><a href="vase_iskustvo.php">Vaše iskustvo</a></li>
</ul>

<?php 
if (isset($_GET['sortiranje']) && $_GET['sortiranje'] == 'true') {
  include('get_sortirane_neisporucene_porudzbine.php');
} else {
  include('get_neisporucene_porudzbine.php');
}

?>

<div>
    <h1>Neisporučene porudžbine</h1>

    <form method="GET" action="" style="border: none; margin: 0;">
        
        <?php 
        if (isset($_GET['sortiranje']) && $_GET['sortiranje'] == 'true') {
          echo '<button>Ponistavanje sortiranja</button>';
          echo '<input type="hidden" name="sortiranje" value="false" />';
        } else {
          echo '<button>Sortiranje po datumu</button>';
          echo '<input type="hidden" name="sortiranje" value="true" />';
        }

        ?>
    </form>
    <hr />

    <table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Datum</th>
        <th>Adresa</th>
        <th>Iznos</th>
        <th>Potvrda</th>
    </tr>
    </thead>
    
    <tbody>
    <?php foreach ($porudzbine as $key => $value) { ?>
        <tr>
            <td><?php echo $value['id'] ?></td>
            <td><?php echo $value['datum_porudzbine'] ?></td>
            <td><?php echo $value['adresa'] ?></td>
            <td><?php echo $value['iznos'] ?></td>
            <form action="porudzbina_isporucena.php" method="POST" style="border: none;">
            <input type="hidden" name="porudzbina_id" value="<?php echo $value['id'] ?>" />
            <td><button type="submit" name="potvrdi_isporuku_dugme">Isporucena</button></td>
            </form>   
        </tr>
    <?php } ?>
    </tbody>
    </table>

</div>


<!-- Footer sekcija -->
<footer>
  <div class="footer">
      <p> &copy; 2022 - Made by Jelisaveta Đukanović </p>
  </div> 
</footer>

</body>
</html>