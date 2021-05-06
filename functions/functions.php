<?php


function checkInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function isEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}


function vardump($var){
    echo '<pre>';
    echo var_dump($var);
    echo '</pre>';
}





?>