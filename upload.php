<!DOCTYPE html>
<html>

<head>
      <meta charset="utf-8">
      <title> Babin lonac </title>
	  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

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

<div style="width: 100%; height: 400px; margin-top: 200px;">
<?php
$target_dir = "uploads/";
$target_file = $target_dir . strval(strtotime("now")) . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    echo "<h2>Molimo Vas da izaberete sliku.</h2>";
    $uploadOk = 0;
  }
} else {
    header('location: vase_iskustvo.php');
    return;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "<h2>Fajl je prevelik.</h2>";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo "<h2>Molimo Vas da izaberete sliku.</h2>";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 1) {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "<h2>Fajl je uspesno sacuvan. Hvala Vam sto se podelili Vas utisak na sa nama :)</h2>";
  } else {
    echo "<h2>Greska se dogodila. Fajl nije sacuvan.</h2>";
  }
} else {
    echo "<h2>Greska se dogodila. Molimo Vas da probate ponovo.</h2>";
}
?>
</div>

<!-- Footer sekcija -->
<footer>
  <div class="footer">
      <p> &copy; 2022 - Made by Jelisaveta Đukanović </p>
  </div> 
</footer>

</body>
</html>