<?php
require_once('../app/Routes.php');// le premeier fichier à inclure les routes (voire app/Routes.php)
function __autoload($class_name)
{// la fonction qui deffinie à chaque fois la classe q'on veut utiliser dans classes où Controllers

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