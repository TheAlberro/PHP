<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author Albert
 */
class user {
    //put your code here
   
    const STATUS_USER = 1;
const STATUS_ADMIN = 2;
protected $userName;
protected $fullName;
protected $email;
protected $password;
protected $date;
//pozostale pola klasy:
//...
//metody klasy:

function __construct($userName, $fullName, $email, $password ){
 
//implementacja konstruktora
$this->status=user::STATUS_USER;
$this->userName=$userName;
$this->fullName=$fullName;
$this->email=$email;
$this->password=password_hash($password,PASSWORD_DEFAULT);
// $this->date=(new DataTime());
$now = new DateTime();
$ymdNow = $now->format('Y-m-d H:i:s');
$this->date = $ymdNow;
//nadać wartości pozostałym polom – zgodnie z parametrami
}
public function get_userName()
   {
      return $this->userName;            
   } 
 
   public function get_fullName()
   {
      return $this->fullName;            
   } 
 
   public function get_email()
   {
      return $this->email;
   }
    public function get_password()
   {
      return $this->password;
   }
   function show() {
//wyswietlić dane o obiekcie User:
//... dolarek jest przy this, nie przy nazwie pola
   // echo get_userName();
    echo "userName:".$this->userName."</br>fullName:".$this->fullName."</br>email:".$this->email."</br>password:".$this->password;       
}

   public function saveDB($db)
   {
       $sql="INSERT INTO `users` (`id`, `userName`, `fullName`, `email`, `passwd`, `status`, `date`)
               VALUES (NULL, '$this->userName', '$this->fullName', '$this->email', '$this->password', '1', '$this->date')";
       echo "$sql";
       if (  $db->insert($sql)=== TRUE) {
echo "Dodano nowy rekord";
} else {
echo "Błąd dodawania nowego rekordu: ";
}
       
 
   }

   static function  getAllUsersFromDB($db){
    
    echo $db->select("select userName,fullName, email, passwd, status, date from users",
array("userName","fullName","email","passwd","status","date"));
}
   /*
   public function GetAllUsers($db)
   {   
    //   echo"$db->select()";
       echo $db->select("select fullName,email,password from users", array("fullName","email","password"));
   }*/
   
   
} 

//zdefiniować pozostałe metod
   
