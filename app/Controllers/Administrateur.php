<?php
class Administrateur extends Controller 
{//la classe qui contient toutes les fonctions qui va servire pour l'interface administrateur
    public static function traitement()
    {//traitement avant l'affichage
        session_start();
        if ($_SESSION["utilisateur"]["id_type"]!="administrateur") 
        {
            unset($_SESSION);
            header('Location:index.php');
        }
    }
    public static function formation_traitement()
    {
        if(isset($_GET["supprimer"])) self::supprimer_formation($_GET["supprimer"]);//pour supprimer une formation
        if (isset($_POST["modifier"])) 
        {
            /* remplir la colone */
            $colone[0]=$_POST["id_formation"];
            $colone[1]=$_POST["titre_formation"];//se deberraser des espaces
            $colone[2]=$_POST["image_formation"];
            $colone[3]=$_POST["petit_description_formation"];
            $colone[4]=$_POST["grande_description_formation"];//se deberraser des espaces
            $colone[5]=$_POST["promotion_formation"];
            $colone[6]=$_POST["nombre_heure_par_seance"];
            $colone[7]=$_POST["id_cathegorie"];
            $_POST["colone"]=$colone;
            self::modifier_formation($colone);//voir data
        }
        if (isset($_POST["ajouter"])) 
        {
            /* remplir la colone */
            $colone[0]=$_POST["titre_formation"];
            $colone[1]=$_POST["image_formation"];
            $colone[2]=$_POST["petit_description_formation"];
            $colone[3]=$_POST["grande_description_formation"];
            $colone[4]=$_POST["promotion_formation"];
            $colone[5]=$_POST["nombre_heure_par_seance"];
            $colone[6]=$_POST["id_cathegorie"];
            self::ajouter_formation($colone);
        }
        $formations=self::charger_formations();
        $_POST["formations"]=$formations;//passage des formations dans la variable post
        $cathegories=self::charger_cathegories();
        $_POST["cathegories"]=$cathegories;//passage de cathegories dans la variable post  
    } 
}
?>