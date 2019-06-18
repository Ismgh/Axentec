<?php 
    class Controller extends data
    {
        public static function View($viewName)//retourn le fichier php qui correspand a la chaine entrer (la fonction d'affichage)
        {
            require_once("../public/Views/$viewName.php");
        }
        public static function logout()
        {// la fonction de sortire de la session
            session_start();
            unset($_SESSION["utilisateur"]);
            header('Location:index.php');
        }
    }
?>