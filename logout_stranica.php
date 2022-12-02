<?php 
    session_start();
    if (!isset($_SESSION['korisnik_id'])) {
        header('location: index.php');        
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
  <li><a href="neisporucene_porudzbine.php">Neisporucene porudzbine</a></li>
  <li><a href="vase_iskustvo.php">Vaše iskustvo</a></li>
</ul>

<h2>Već ste ulogovani. Kliknite na dugme kako biste se izlogovali.</h2>
<form method="POST" action="logout.php" style="border:none; margin: 5px;">
    <button name="logout_dugme" type="s">Izlogujte se</button>
</form>

<!-- Footer sekcija -->
<footer>
  <div class="footer">
      <p> &copy; 2022 - Made by Jelisaveta Đukanović </p>
  </div> 
</footer>

</body>
</html>