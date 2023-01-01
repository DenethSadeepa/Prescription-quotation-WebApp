<?php

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function escape($string)
{
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}
