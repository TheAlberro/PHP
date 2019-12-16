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
echo "<h2>Informacje tylko dla uprawnionych</h2>";
//sprawdzenie zmiennej sesji
if (isset($_SESSION["userOK"])) {
$user = unserialize($_SESSION["userOK"]);
echo "Użytkownik zalogowany jako:" .$user->getName(). "<br/>";
echo "Informacje tylko dla zalogowanych użytkowników ...";
} else {
echo "<h2>Użytkownik niezalogowany</h2>";
echo "Tylko zalogowani użytkownicy mogą oglądać tę stronę";
}
echo "<br /><a href=\"loginForm.php\"> Powrót do strony głównej</a>";
?>
    </body>
</html>
