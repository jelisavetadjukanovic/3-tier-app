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

<?php include('get_sva_jela.php') ?>

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

<div class="grid-container">
  <div class="grid-child">
    <div class="row">
        <div class="grid-child">
            <div class="row">
                <div class="col-menu-1">
                <?php $ukupno = 0; ?>
                    <form>
                    <h1>Sadržaj korpe</h1>
                    <?php if (array_key_exists("korpa", $_SESSION)) { ?>
                    <table>
                    <?php foreach ($_SESSION['korpa'] as $key => $value) { ?>
                        <?php $ukupno += $value['cena']; ?>
                        <tr>
                        <td><?php echo $value['jelo_naziv'] ?></td>
                        <td><?php echo $value['kolicina'] ?></td>
                        <td><?php echo $value['cena'] ?></td>
                        </tr>
                        </div>
                    <?php } ?>
                    </table>

                    <hr />

                    <div>
                        <b>Ukupno: <?php echo $ukupno ?> RSD</b>
                    </div>

                    <br />
                    <?php } ?>
                    </form>
                </div>
            </div>
     </div>
   </div>
</div>

   <div class="grid-child">
        <div class="row">  
        <div class="col-menu-2">
            <form action="potvrdi_porudzbinu.php" method="POST">
            <h1>Podaci za dostavu</h1>
            
            <div>
                <label>Ime</label>
                <input name="ime" value="<?php echo $_SESSION['korisnik_ime'] ?>" />
            </div>

            <div>
                <label>Prezime</label>
                <input name="prezime" value="<?php echo $_SESSION['korisnik_prezime'] ?>" />
            </div>

            <div>
                <label>Adresa</label>
                <input name="adresa" />
            </div>

            <?php
            if (isset($_GET['greska'])) { ?>
              <div style="background: red; color: white; padding: 20px; margin: 10px;">
              <?php echo $_GET['greska'] ?>
            </div>
            <?php } ?>

            <button type="submit" name="potvrdi_porudzbinu_dugme">Potvrdi</button>

            </form>
        </div>
        </div>
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