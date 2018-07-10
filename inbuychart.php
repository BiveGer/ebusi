<?php
include("datenbank.php");
$produkt = $_GET["id"];

if(isset($_SESSION['kunde'])){
$kunde = $_SESSION['kunde'];
$statement = $pdo->prepare("INSERT INTO `warenkorb`(`KundenID`, `ArtikelID`) VALUES ($kunde, $produkt)");

$statement->execute();

$result = $statement->get_result();
}

header("Location: Warenkorb.php");
exit();
?>
