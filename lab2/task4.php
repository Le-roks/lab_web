<?php class A
{
    public static function test()
    {
        echo 1;
    }

    public static function get()
    {
        static::test(); //змінили код таким чином, щоб одержати доступ до методу test() класу B
    }
}

class B extends A
{
    public static function test()
    {
        echo 2;
    }
}

B::get();
?>