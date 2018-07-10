<?php
include("datenbank.php");

if(isset($_SESSION['kunde'])){
$kundewaren = $_SESSION['kunde'];
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
<body>
<div id="header">
<img id="logo" src="../img/heart.png"/>
</div>
<ul list-style-type:none>
  <li><a class="active" href="homepage.php">Startseite</a></li>
  <li><a href="Alkohol.php">Alkohole</a></li>
    <ul> </ul>

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

<?php

if($angemeldet){
$preisgesamt = 0;

$statement = $pdo->prepare("SELECT * FROM warenkorb WHERE KundenID= $kundewaren");
$statement->execute();

$result = $statement->get_result();


while($row = $result->fetch_assoc()){

        $test = $row['ArtikelID'];

        $statement2 = $pdo->prepare("SELECT * FROM produkte WHERE ArtikelID = $test");
        $statement2->execute();

        $result2 = $statement2->get_result();

        $bild2 = $result2->fetch_assoc();
?>

<div class="gradient">

  <img src="<?php echo $bild2['Image'] ?>" width="100" length = "100"/>
</div>

        <div class="gradient2" width="500">

        <h2><b> <?php echo $bild2['Bezeichnung'] ?></b></h2>
          <p>  <?php echo $bild2['Beschreibung'] ?> </p>
        </div>

          <div class="gradient">


              <p id="preis"><font size="5"><b>  <?php echo $bild2['Preis']?> €</b></font></p>

            <a href="delete.php?produkt=<?php echo $bild2['ArtikelID'] ?>" class="btn btn-default">Löschen</a>

          </div>


<?php
$preisgesamt = $preisgesamt + $bild2['Preis'];
}
?>

<div id="gesamt">
  <h1> Gesamtpreis: <?php echo "$preisgesamt" ?> </h1>
</br>
  <input type="submit" value="Jetzt bezahlen!">
<div>
<?php
}else{
 ?>
<h1 align="center"> WARENKORB LEER!</h1></br>

<h1 align="center"><a href="login.php">ANMELDEN</a> oder <a href="registrieren.php">REGISTRIEREN</a></h1>
<?php } ?>
</body>
</html>
