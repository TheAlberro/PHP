<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php 
        require_once "klasy/Baza.php"; 
        require_once "klasy/UserLog.php";
session_start();
if (filter_input(INPUT_POST, "login")) {
$bd = new Baza("localhost","root","","test");
$name = filter_input(INPUT_POST,"name",FILTER_SANITIZE_MAGIC_QUOTES);
$pass = hash("sha256",
filter_input(INPUT_POST,"pass",FILTER_SANITIZE_MAGIC_QUOTES));
$user = UserLog::login($name, $pass, $bd, 'users');
if ($user == null) echo "Błąd logowania";
} ?>
<h2>Strona główna</h2>
<?php
if (isset($_SESSION["userOK"])) {
$user=unserialize($_SESSION['userOK']);
echo "Użytkownik zalogowany jako:" . $user->getName() . "<br />";
echo "<a href='wyloguj.php' >Wyloguj</a><br />";
} else UserLog::loginForm("#");
?>
<p> <a href="uprawnieni.php">Tylko uprawnieni</a> </p>
    </body>
</html>
