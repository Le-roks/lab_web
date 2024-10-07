<?php class Coor
{
    private $text;
    private $login;
    private $password;

    function __construct($text, $login, $password) // function for setting name  
    {
        $this->text = $text; //set some “text” to this “text”;
        $this->login = $login; //set some “login” to this “login”;
        $this->password = $password; //set some “password” to this “password”;
    }

    function Getname()  //function for getting name
    {
        echo "<p>Name: " . $this->text . "<br>"; // printing name  
    }

    function Getlogin() //function for getting login
    {
        echo "Login: " . $this->login . "<br>"; // printing login
    }

    function Getpassword() //function for getting password
    {
        echo "Password: " . $this->password . "<br>"; // printing password
    }

    function __destruct()
    {
        print "<br>Destroying " . $this->text . "<br>";
    }
}

$object = new Coor("Nick", "Ter_l", "uiui899"); //creating “Coor” object
$object->Getname(); //function call
$object->Getlogin(); //function call
$object->Getpassword(); //function call

$object2 = new Coor("Lera", "Val", "ui899"); //creating
$object2->Getname(); //function call
$object2->Getlogin(); //function call
$object2->Getpassword(); //function call

$object3 = new Coor("Max", "Mmma", "9909s0"); //creating
$object3->Getname(); //function call
$object3->Getlogin(); //function call
$object3->Getpassword(); //function call
?>