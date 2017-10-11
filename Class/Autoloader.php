<?php
namespace APP;
class Autoloader
{
    public static function register()
    {
        spl_autoload_register(array(__CLASS__, "autoload"));
    }

    public static function autoload($class)
    {
        $class = str_replace(__NAMESPACE__."\\", "", $class);
        require "Class/".$class.".php";
    }
}