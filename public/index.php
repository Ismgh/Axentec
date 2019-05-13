<?php
require_once('../app/Routes.php');

function __autoload($class_name){

    if(file_exists('../app/classes/'.$class_name.'.php'))
    {
    require_once '../app/classes/'.$class_name.'.php';
    }
    else if(file_exists('../app/Controllers/'.$class_name.'.php'))
    {
    require_once '../app/Controllers/'.$class_name.'.php';
    }
}
?>