<?php class Coor
{
    private $text;

    function __construct($text) // function for setting name  
    {
        $this->text = $text; //set some “text” to this “text”;
    }

    function Getname()  //function for getting name
    {
        echo "<p>Name: " . $this->text . "<br>"; // printing name  
    }

    function __destruct()
    {
        print "Destroying " . $this->text . "<br>";
    }
}

$object = new Coor("Nick"); //creating “Coor” object
$object->Getname(); //function call
?>