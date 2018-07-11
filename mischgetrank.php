<?php
include("datenbank.php");

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="UTF-8">
  <title>Auto</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Bitnami: Open Source. Simplified</title>
  <link href="Webshop.css" media="all" rel="Stylesheet" type="text/css" />

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
  <li><a href="mischgetränke.php">Mischgetränke</a></li>
  <li><a href="cocktail.php">Cocktailgetränke</a></li>
    <ul> </ul>


  <li><a href="softdrinks.php">Softdrinks</a></li>

  <li style="float:right"><a href="registrieren.php">Registrieren</a></li>
  <li style="float:right"><a href="login.php">Anmelden</a></li>
</ul>

<div id ="topseller">

    <a style="display:block" href="produkt.php?id=6">
    <div class="gradient">
    <img src="../img/vplus.jpg" width = "100" length ="100"/>
    <p> V-Plus </p>
  </div>
</a>

  <a style="display:block" href="produkt.php?id=7">
  <div class="gradient">
<img src="../img/Rothaus.jpg" width = "100" length ="100"/>
    <p> Mixery Guarana </p>
  </div>
</a>

<div>




</body>
</html>
