<?php
include("datenbank.php");
$angemeldet = false;

if(isset($_GET["kunde"])){
$_SESSION['kunde'] = $_GET["kunde"];
$angemeldet = true;
}else{
  $angemeldet = false;
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="UTF-8">
  <title>Auto</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Bitnami: Open Source. Simplified</title>
  <link href="Webshop.css" media="all" rel="Stylesheet" type="text/css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="java.js"></script>
   <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body background="../img/hintergrund2.jpg">
<div id="header">
<img id="logo" src="../img/heart.png"/>
</div>
<ul list-style-type:none>
  <li><a class="active" href="homepage.php">Startseite</a></li>
  <li><a href="Alkohol.php">Alkohole</a></li>
  <li><a href="mischgetrank.php">Mischgetränke</a></li>
  <li><a href="cocktail.php">Cocktailgetränke</a></li>
  <li><a href="softdrinks.php">Softdrinks</a></li>

<?php
if($angemeldet == false){
  ?>

  <li style="float:right"><a href="registrieren.php">Registrieren</a></li>
  <li style="float:right"><a href="login.php">Anmelden</a></li>
</ul>
<?php
}
else{
  ?>
  <li style="float:right"><a href="logout.php">Abmelden</a></li>
  <li style="float:right"><a href="login.php">Suchen</a></li>
  <li style="float:right">
    <button type="button" class="btn btn-default btn-sm">
      <a href="Warenkorb.php" class="btn btn-info btn-lg">
       <span class="glyphicon glyphicon-shopping-cart"></span> Warenkorb
     </a>
    </button>
    </li>
  </ul>
<?php
}
  ?>

<h1 align="center">Willkommen zu Heart-Alkohol!</h1>

<div id="topseller" algin ="center">

  <a style="display:block" href="produkt.php?id=3">
  <div class="gradient3">
  <img src="../img/cola.jpg" width = "100" length ="100"/>
  <p><b> Coca-Cola</b></p>
</div>
</a>

<a style="display:block" href="produkt.php?id=4">
<div class="gradient3">
<img src="../img/corona.jpg" width = "100" length ="100"/>
  <p><b> Corona </b></p>
</div>
</a>

<a style="display:block" href="produkt.php?id=2">
<div class="gradient3">
<img src="../img/vodka.jpg" width = "100" length ="100"/>
<p> <b>Vodka Gorbatschow</b> </p>
</div>
</a>

<a style="display:block" href="produkt.php?id=1">
<div class="gradient3">
<img src="../img/beam.jpg" width = "100" length ="100"/>
<p><b> Jim Beam </b></p>
</div>
</a>

<a style="display:block" href="produkt.php?id=5">
<div class="gradient3">
<img src="../img/morgan.jpg" width = "100" length ="100"/>
<p> <b>Captain Morgan</b> </p>
</div>
</a>

  </div>


</body>
</html>
