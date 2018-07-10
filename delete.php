<?php
include("datenbank.php");

$produkt = $_GET['produkt'];
$kunde = $_SESSION['kunde'];
$statement = $pdo->prepare("DELETE FROM `warenkorb` WHERE ArtikelID = $produkt and KundenID = $kunde");

$statement->execute();

$result = $statement->get_result();

header("Location: Warenkorb.php");
exit();

 ?>
