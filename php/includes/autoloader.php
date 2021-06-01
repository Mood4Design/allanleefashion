<?php

function __autoload($className)
{
    $className = str_replace('\\','/',$className);
    $className = $className . ".php";
    require_once(ROOT . PROJECT . "php/" . $className);
}
