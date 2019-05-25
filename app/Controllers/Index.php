<?php
class Index extends Controller 
{//la classe qui contient toutes les fonctions qui va servire pour l'interface client
    public static function traitement_index()
    {//la fonction qui va faire le traitement avant l'affichage de l'interface index.php
        $formations=self::afficher_formations();
        $_POST["formations"]=$formations;//passage des formations dans la variable post
        $cathegories=self::afficher_cathegories();
        $_POST["cathegories"]=$cathegories;//passage de cathegories dans la variable post
    }
    public static function traitement_contact()
    {//la fonction qui va faire le traitement avant l'affichage de l'interface contact.php
        $cathegories=self::afficher_cathegories();
        $_POST["cathegories"]=$cathegories;//passage de cathegories dans la variable post
    }
    private static function afficher_formations()
    {
        $r=self::charger_formations();
        return $r;
    }
    private static function afficher_cathegories()
    {
        $r=self::charger_cathegories();
        return $r;
    }
}
?>