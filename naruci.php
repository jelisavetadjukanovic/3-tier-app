<?php 
  session_start();
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
  <li><a href="neisporucene_porudzbine.php">Neisporučene porudžbine</a></li>
  <li><a href="vase_iskustvo.php">Vaše iskustvo</a></li>
</ul>

<div class="grid-container">
  <div class="grid-child">
    <div class="row">
      <div class="col-menu-1">
        <div>
          <h1>Izaberite proizvode i količine</h1>

          <table style="margin-bottom: 50px;">
            <?php while($row = $jela->fetch_assoc()) { ?>
              <form method="POST" action="dodaj_u_korpu.php">
                <tr>
                  <input type="hidden" name="jelo_id" value="<?php echo $row['id'] ?>" />
                  <input type="hidden" name="jelo_naziv" value="<?php echo $row['naziv'] ?>" />

                  <td><span><?php echo $row['naziv'] ?></span></td>
                  <td><select name="kolicina">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                  </select></td>
                  <input name="cena" type="hidden" value="<?php echo $row['cena'] ?>" />
                  <td><span><?php echo $row['cena'] ?> RSD</span></td>
                  <td><button type="submit" name="jelo_dugme">Dodaj u korpu</button></td>
                </tr>
            </form>
            <?php } ?>
          </table>
        </div>
      </div>
    </div>
  </div>


  <div class="grid-child">
    <div class="row">
      <div class="col-menu-2">
      <?php $ukupno = 0; ?>
        <?php if (array_key_exists("korpa", $_SESSION)) { ?>
        <form action="potvrdi_porudzbinu.php" method="POST">
          <h1>Sadržaj korpe</h1>
          
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

          <a href="pregled_porudzbine.php"><button type="button" >Pregled porudžbine</button></a>
          </form>
        <?php } ?>
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