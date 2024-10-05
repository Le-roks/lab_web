<?php class Coor
{
    private $name;
    function Getname()
    {

        echo $this->name;

    }

    function Setname($text)
    {

        $this->name = $text;

    }

}

$works = array();//creating a new array

$works[0] = new Coor();//writing a “Coor” object in array

$works[0]->Getname() = " Nick ";//set a name

$works[1] = new Coor();

$works[1]->Getname() = " Nick 1";

$works[2] = new Coor();

$works[2]->Getname() = " Nick 2";

for ($i = 0; $i < 3; $i++) {
    echo $works[$i]->Getname();
}

//circle with printing names of objects in array

?>