<?php 
    session_start();
    if (isset($_SESSION['korisnik_id'])) {
        header('location: index.php?poruka=Registraciji mogu da pristupe samo neregistrovani korisnici!');
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
  <li><a href="neisporucene_porudzbine.php">Neisporucene porudzbine</a></li>
  <li><a href="vase_iskustvo.php">Vaše iskustvo</a></li>
</ul>

<form method="POST" action="registracija.php">
    <label>Ime</label>
    <input name="ime" />
    <label>Prezime</label>
    <input name="prezime" />
    <label>Korisnicko ime</label>
    <input name="korisnicko_ime" />
    <label>Lozinka</label>
    <input name="lozinka" />
    <label>Ponovite lozinku</label>
    <input name="lozinka_potvrda" />
    <br />
    <button name="registracija_dugme" type="submit">Registracija</button>

    <?php 
        if (isset($_GET['greska'])) {
            echo '<label style="color: red;">';
            echo $_GET["greska"];
            echo '</label>';
        }
    ?>
</form>

<!-- Footer sekcija -->
<footer>
  <div class="footer">
      <p> &copy; 2022 - Made by Jelisaveta Đukanović </p>
  </div> 
</footer>

</body>
</html>