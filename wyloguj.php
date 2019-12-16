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
require_once "klasy/UserLog.php";
session_start();
if (isset($_SESSION["userOK"])) {
$old_user = unserialize($_SESSION["userOK"]); //czy nastąpiło logowanie
if ($old_user != null) {
echo "<p>Wylogowano użytkownika:" . $old_user->getName() . " </p>";
unset($_SESSION["userOK"]);
$old_user->logout();
}
} else echo "Użytkownik niezalogowany.<br />";
?>
<p> <a href="loginForm.php"> Powrót do strony logowania </a> </p>
    </body>
</html>
