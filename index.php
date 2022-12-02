<?php include('ddl.php') ?>

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
  <a href="naruci.php">
  <button>NARUČI</button>
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

<?php
if (isset($_GET['poruka'])) { ?>
  <h1 style="background: lightgreen; color: white; padding: 40px;">
  
<?php echo $_GET['poruka'] ?>
</h1>
<?php } ?>

<!-- Gallery/Fotografije Sekcija -->
<div id="gallery">
    <div class="gallery-item"> <img src="img/gallery/01.jpg" class="img-responsive" alt=""></div>
    <div class="gallery-item"> <img src="img/gallery/02.jpg" class="img-responsive" alt=""></div>
    <div class="gallery-item"> <img src="img/gallery/03.jpg" class="img-responsive" alt=""></div>
    <div class="gallery-item"> <img src="img/gallery/04.jpg" class="img-responsive" alt=""></div>
</div>

<!-- Footer sekcija -->
<footer>
  <div class="footer">
      <p> &copy; 2022 - Made by Jelisaveta Đukanović </p>
  </div> 
</footer>

<?php if (!isset($_COOKIE['POLITIKA'])) { ?>
<div class="dobrodoslica">
  <h3>Dobrodošli u restoran Babin lonac. Naš restoran ima ustanovljenu politiku obezbeđenja najbolje usluge svojim kupcima.</h3>
  <form action="prihvatanje_politike.php" method="POST" style="border: none;">
    <button type="submit" name="prihvatanje_politike_dugme">Prihvatam politiku</button>
  </form>
</div>
<?php } ?>

</body>
</html>