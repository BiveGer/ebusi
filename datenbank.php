<?php
session_start();

$pdo = mysqli_connect("localhost", "root", "", "users");

mysqli_set_charset($pdo,"utf8");

?>
