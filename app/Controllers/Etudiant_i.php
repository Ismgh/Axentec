
<?php
class Etudiant_i extends Controller 
{//la classe qui contient toutes les fonctions qui va servire pour l'interface etudiant
    public static function traitement()
    {//traitement avant l'affichage
        session_start();
        if ($_SESSION["utilisateur"]["id_type"]!="etudiant") self::logout();
        //tester si l'etudiant est approuver
        if(self::verifier_etudiant_formation_id_etudiant($_SESSION["utilisateur"]["user"])==0) $_SESSION["utilisateur"]["approuver"]=0;
        else $_SESSION["utilisateur"]["approuver"]=1;
    }
    public static function traitement_contact()
    {//la fonction qui va faire le traitement avant l'affichage de contact
        if(isset($_POST["nom_prenom"]))
        {//envoier le message par email
            $message=" nom et prenom :  ".$_POST["nom_prenom"]; 
            $message = $message."\r\n";//retour à la ligne
            $message =$message." num de telephone :  ".$_POST["telephone"]; 
            $message = $message."\r\n";//retour à la ligne
            $message =$message." email :  ".$_POST["email"]; 
            $message = $message."\r\n";//retour à la ligne
            $message =$message." message :  ".$_POST["message"];
            $administrateurs=self::charger_utilisateur_admin();
            while($administrateur=$administrateurs->fetch())
            {
                mail($administrateur["email_utilisateur"], 'contact', $message,'From: john0sloth@gmail.com');
            }
            $_POST["erreur"]="le message est envoiée !";
        }   
    }
    public static function traitement_utilisateur()
    { 
        $utilisateur=self::charger_utilisateur_id($_SESSION["utilisateur"]["user"]);
        $_POST["utilisateur"]=$utilisateur;//passage de l'utilisateur dans la variable post
    }
    public static function traitement_formation()
    { 
        $etudiant_formations=self::charger_etudiant_formation_id_etudiant($_SESSION["utilisateur"]["user"]);
        $_POST["etudiant_formations"]=$etudiant_formations;//passage de etudiant_formations dans la variable post
    }
}