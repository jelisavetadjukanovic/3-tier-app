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

<!-- Meni Sekcija -->
<div id="restaurant-menu">
  <div class="container">

  <?php include('get_jela.php') ?>
  <?php $i = 0 ?>
  
  <div class="grid-container">
    <?php foreach ($kategorije as $key => $value) {?>
    <div class="grid-child purple">
      <div class="row">
        <div class="<?php echo $i++ % 2 == 0 ? 'column-menu1' : 'column-menu2' ?>" >
          <div class="col-xs-12 col-sm-6">
            <div class="menu-section">
              <h2 class="menu-section-title"><?php echo $key ?></h2>
              <?php foreach ($value as $k => $val) { ?>
              <div class="menu-item">
                <div class="menu-item-name"><?php echo $val['jelo_naziv'] ?></div>
                <div class="menu-item-price"> <?php echo $val['cena'] ?> RSD </div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
	    </div>
    </div>
    <?php } ?>
  </div>
</div>

<!-- Footer sekcija -->
<footer>
  <div class="footer">
      <p> &copy; 2022 - Made by Jelisaveta Đukanović </p>
  </div> 
</footer>

</body>
</html>