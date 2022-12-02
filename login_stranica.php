<?php 
    session_start();
    if (isset($_SESSION['korisnik_id'])) {
        header('location: logout_stranica.php');        
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
  </a>
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

<form method="POST" action="login.php">
    <label>Korisnicko ime</label>
    <input name="korisnicko_ime" />
    <label>Lozinka</label>
    <input name="lozinka" />
    <br />
    <button name="login_dugme" type="submit">Prijava</button>
    <br />
    <br />
    <div>Nemate nalog?  <a href="registracija_stranica.php">Registrujte se</a></div>

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