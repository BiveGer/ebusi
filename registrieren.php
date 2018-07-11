<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=users', 'root', '');

?>
<!DOCTYPE html>
<html>
<head>
  <title>Registrierung</title>
    <link href="Webshop.css" media="all" rel="Stylesheet" type="text/css" />
</head>
<body>

<?php
$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll

if(isset($_GET['register'])) {
    $error = false;
$Benutzername = $_POST['Benutzername'];
$Vorname = $_POST['Vorname'];
$Name = $_POST['Name'];
    $email = $_POST['email'];
    $passwort = $_POST['passwort'];
    $passwort2 = $_POST['passwort2'];
    $Straße = $_PPOST['Straße'];
    $Ort = $_PPOST['Ort'];
    $PLZ = $_PPOST['PLZ'];
    $Hausnummer = $_PPOST['Hausnummer'];

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
        $error = true;
    }
    if(strlen($passwort) == 0) {
        echo 'Bitte ein Passwort angeben<br>';
        $error = true;
    }
    if($passwort != $passwort2) {
        echo 'Die Passwörter müssen übereinstimmen<br>';
        $error = true;
    }


    //Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
    if(!$error) {
        $statement = $pdo->prepare("SELECT * FROM Kunden WHERE email = :email");
        $result = $statement->execute(array('email' => $email));
        $user = $statement->fetch();

        if($user !== false) {
            echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
            $error = true;
        }
    }

    if(!$error) {
        $statement = $pdo->prepare("SELECT * FROM Kunden WHERE Benutzername = :Benutzername");
        $result = $statement->execute(array('Benutzername' => $Benutzername));
        $user = $statement->fetch();

        if($user !== false) {
            echo 'Benutzername vergeben';
            $error = true;
        }
    }

    //Keine Fehler, wir können den Nutzer registrieren
    if(!$error) {

        $statement = $pdo->prepare("INSERT INTO `kunden`(`Benutzername`, `Vorname`, `Name`, `Email`, `Passwort`, `Straße`, `Hausnummer`, `Ort`, `PLZ`,) VALUES (:Benutzername, :Vorname, :Name, :email, :passwort, :Straße, :Hausnummer, :Ort, :PLZ)");
        $result = $statement->execute(array('email' => $email, 'passwort' => $passwort, 'Benutzername' => $Benutzername,'Vorname' => $Vorname,'Name' => $Name,'Anschrift' => $Anschrift));

        if($result) {
            echo 'Du wurdest erfolgreich registriert. <a href="login.php">Zum Login</a>';
            $showFormular = false;
        } else {
            echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
        }
    }
}

if($showFormular) {
?>

<div align = "center">
<h1> Jetzt Registrieren </h1>


<form action="?register=1" method="post">

  Benutzername:<br>
  <input type="text" size="40" maxlength="45" name="Benutzername"><br><br>

  Vorname:<br>
  <input type="text" size="40" maxlength="250" name="Vorname"><br><br>

  Nachname:<br>
  <input type="text" size="40" maxlength="250" name="Name"><br><br>

  Ort:<br>
  <input type="text" size="40" maxlength="250" name="Ort"><br><br>

  PLZ:<br>
  <input type="text" size="40" maxlength="250" name="PLZ"><br><br>

  Straße:<br>
  <input type="text" size="40" maxlength="250" name="Straße"><br><br>

  Hausnummer:<br>
  <input type="text" size="40" maxlength="250" name="Hausnummer"><br><br>


E-Mail:<br>
<input type="email" size="40" maxlength="250" name="email"><br><br>

Passwort:<br>
<input type="password" size="40"  maxlength="250" name="passwort"><br><br>

Passwort wiederholen:<br>
<input type="password" size="40" maxlength="250" name="passwort2"><br><br>

<input type="submit" value="Jetzt Registrieren">
</form>
</div>



<?php
} //Ende von if($showFormular)
?>

</body>
</html>
