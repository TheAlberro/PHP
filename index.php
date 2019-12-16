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
        <?php/*
        echo "I am alive!";
        include_once('klasy/RegistrationForm.php');
        include_once('klasy/user.php');
         include_once('klasy/Baza.php');
        $db = new Baza('localhost', 'root', '', 'test');
$pass=hash('sha256', 'beata');
$sql = "insert into users values ('beata', '$pass' );";
$db->insert($sql);
$pass=hash('sha256', 'ania');
$sql = "insert into users values ('ania', '$pass' );";
$db->insert($sql);*/
        
        include_once "klasy/Baza.php";
        
$db = new Baza('localhost', 'root', '', 'test');
$pass=hash('sha256', 'beata');
$sql = "insert into users values ('beata', '$pass' );";
echo $sql;
$db->insert($sql);
$pass=hash('sha256', 'ania');
$sq2 = "insert into users values ('ania', '$pass' );";
echo $sql2;
$db->insert($sql);

        
        ?>
    </body>
</html>
