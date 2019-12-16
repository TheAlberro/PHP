<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RegistrationForm
 *
 * @author Albert
 */
class RegistrationForm {
    //put your code here
    protected $user;
 function __construct(){ ?>
 <h3>Formularz rejestracji</h3><p>
 <form action="index.php" method="post">
 Nazwa użytkownika: <br/><input name="userName" /><br/>
 Imie i nazwisko: <br/><input name="fullName" /><br/>
 Haslo: <br/><input type="password" name="password" /><br/>
 Email: <br/><input type="text" name="email"></br>
 <button type="submit"   name="submit" value="Dodaj"> Dodaj  </button>
 <button type="reset"   name="submit" value="Wyczysc"> Wyczysc  </button>
  <button type="pokaz"   name="pokaz" value="pokaz"> Pokaz  </button>
 //dodaj pozostałe pola formularza
 </form></p>
 <?php
 }
 function checkUser(){ // podobnie jak metoda validate z lab4
 $args = [
 'userName' => ['filter' => FILTER_VALIDATE_REGEXP,
 'options' => ['regexp' => '/^[A-Z]{1}[a-ząęłńśćźżó-]{1,25}$/']
 ],
 'fullName' =>['filter' => FILTER_SANITIZE_STRING,
      'flags' => FILTER_NULL_ON_FAILURE],
     
     'email' =>FILTER_VALIDATE_EMAIL,
 // pozostałe warunki do walidacji
     'password' =>['filter'=> FILTER_VALIDATE_REGEXP,
  "options" => ["regexp" => "/.{6,25}/"] ]
 ];
 
 $dane = filter_input_array(INPUT_POST, $args);
     //pokaż tablicę po przefiltrowaniu - sprawdź wyniki filtrowania:
     var_dump($dane);
 $errors = "";
     foreach ($dane as $key => $val) {
     if ($val === false or $val === NULL) {
     $errors .= $key . " ";
     }
     }
    
 
 //sprawdz czy są błędy walidacji $errors – jak w lab4
 if ($errors === "") {
 //Dane poprawne – utwórz obiekt user
 $this->user=new User($dane['userName'], $dane['fullName'],
 $dane['email'],$dane['password']);


 /*
 if($_COOKIE[$dane['userName']]==NULL)
 setcookie($dane['userName'],$dane['userName']);
 else
 return;
*/
 } else {
 echo "<p>Błędne dane:$errors</p>";
 $this->user = NULL;
 }
 return $this->user;
 }
}
