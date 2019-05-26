<?php
class Test extends Controller 
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
    public static function traitement_travaille_stage()
    {//la fonction qui va faire le traitement avant l'affichage de l'interface travaille_stage.php
        $offres=self::afficher_offres();
        $_POST["offres"]=$offres;//passage de offres dans la variable post
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
    private static function afficher_offres()
    {
        $r=self::charger_offres();
        return $r;
    }
    public static function bontemp ($time)
    {//la fonction qui transforme le temp en un bon text exemple :  2011/09/04 13:10:01 => il'a un jour
        $time=strtotime($time);
        $time = time() - $time; //obtenir le temp passée
        $time = ($time<1)? 1 : $time;
        $tokens = array (
            31536000 => 'annee',
            2592000 => 'mois',
            604800 => 'semaine',
            86400 => 'jour',
            3600 => 'heure',
            60 => 'minute',
            1 => 'second'
        );
        foreach ($tokens as $unit => $text) {
            if ($time < $unit) continue;
            $numberOfUnits = floor($time / $unit);
            return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
        }
    }
}
?>