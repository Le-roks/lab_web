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

}

$object = new Coor("Nick"); //creating “Coor” object
$object->Getname(); //function call

unset($object); // removing the object
if (isset($object)) {
    echo "The object still exists!";
} else {
    echo "The object has been destroyed!";
}
?>