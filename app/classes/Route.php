<?php
class Route
{
    public static $validRoutes = array();
    public static function set($route,$function)
    { 
        self::$validRoutes[] = $route;// garder la traces des utilisateurs
        if(!isset($_GET['url'])) $_GET['url']='';
        if($_GET['url']==$route)//executer la fonction pour chaque url entrer par l'utilisateurS
        {
            $function->__invoke();
        }
    }
}
?>