<?php
include("datenbank.php");
if(isset($_GET['login'])) {
    $email = $_POST['email'];
    $passwort = $_POST['passwort'];

    $statement = $pdo->prepare("SELECT * FROM kunden WHERE email = :email");




    $result = $statement->execute(array('email' => $email));
    $user = $statement->fetch();

    //Überprüfung des passworts
    if ($user !== false && ($user['Passwort'] == $passwort)) {
        $_SESSION['userid'] = $user['KundenID'];

        die('Login erfolgreich. Weiter zur <a href="homepage.php?kunde='.$user['KundenID'].'">Startseite</a>');
    } else {
        $errorMessage = "E-Mail oder passwort war ungültig<br>";
    }

}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
<link href="Webshop.css" media="all" rel="Stylesheet" type="text/css" />
</head>
<body>


<div align = "center">
  <h1> Login </h1>


<form action="?login=1" method="post">
Deine E-Mail:<br>
<input type="email" size="40" maxlength="250" name="email"><br><br>

Dein passwort:<br>
<input type="password" size="40"  maxlength="250" name="passwort"><br><br>

<input type="submit" value="Einloggen">

</form>
</div>

</body>
</html>
