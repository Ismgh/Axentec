
<?php
class Etudiant_i extends Controller 
{//la classe qui contient toutes les fonctions qui va servire pour l'interface etudiant
    public static function traitement()
    {//traitement avant l'affichage
        session_start();
        if ($_SESSION["utilisateur"]["id_type"]!="etudiant") self::logout();
        //tester si l'etudiant est approuver
        if(self::verifier_etudiant_formation_id_etudiant($_SESSION["utilisateur"]["user"])==0) $_SESSION["utilisateur"]["approuver"]=0;
    }
}