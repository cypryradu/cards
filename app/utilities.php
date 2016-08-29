<?php

function readDataFromJsonFile($file, $defaultIfEmpty = [])
{
    $contents = file_get_contents(APPLICATION_PATH . '/data/' . $file);

    if (empty($contents)) {
        return $defaultIfEmpty;
    }

    return json_decode($contents, true);
}

function saveDataToJsonFile($file, $data)
{
    file_put_contents(APPLICATION_PATH . '/data/' . $file, json_encode($data));
}

function camelize($str)
{
    return lcfirst(capitalize($str));
}

function capitalize($str)
{
    return str_replace(' ', '', ucwords(str_replace('-', ' ', $str)));
}

function slugify($text)
{
    // replace non letter or digits by -
    $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

    // trim
    $text = trim($text, '-');

    // transliterate
    if (function_exists('iconv')) {
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    }

    // lowercase
    $text = strtolower($text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}


function sanitizeValue(&$value, $key, $classNotToSanitize)
{
    if (is_subclass_of($value, $classNotToSanitize)) {
        return $value;
    }

    $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function sanitizeVars(&$vars, $classNotToSanitize = '')
{
    array_walk_recursive($vars, "sanitizeValue", $classNotToSanitize);
}

function ifEmpty(&$var, $default = '')
{
    if (empty($var)) {
        return $default;
    }

    return $var;
}
