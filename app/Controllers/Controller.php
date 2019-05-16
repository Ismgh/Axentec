<?php 
    class Controller extends data
    {
        public static function View($viewName)//retourn le fichier php qui correspand a la chaine entrer (la fonction d'affichage)
        {
            require_once("../public/Views/$viewName.php");
        }
    }
?>