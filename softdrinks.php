<?php
include("datenbank.php");

if(isset($_SESSION['kunde'])){
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

   <script src="java.js"></script>
   <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body background="../img/hintergrund.jpg">
<div id="header">
<img id="logo" src="../img/heart.png"/>
</div>
<ul list-style-type:none>
  <li><a class="active" href="homepage.php">Startseite</a></li>
  <li><a href="Alkohol.php">Alkohole</a></li>
  <li><a href="softdrinks.php">Softdrinks</a></li>

<?php
if(!$angemeldet){
 ?>

  <li style="float:right"><a href="registrieren.php">Registrieren</a></li>
  <li style="float:right"><a href="login.php">Anmelden</a></li>
</ul>

<?php
}else{
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


<div id ="topseller">

    <a style="display:block" href="produkt.php?id=3">
    <div class="gradient">
    <img src="../img/cola.jpg" width = "100" length ="100"/>
    <p> Coca-Cola </p>
  </div>
</a>

  <a style="display:block" href="produkt.php?id=4">
  <div class="gradient">
<img src="../img/corona.jpg" width = "100" length ="100"/>
    <p> Corona </p>
  </div>
</a>

</div>



</body>
</html>
