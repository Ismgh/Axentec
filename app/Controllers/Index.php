<?php
class Index extends Controller 
{//la classe qui contient toutes les fonctions qui va servire pour l'interface client
    public static function traitement_index()
    {//la fonction qui va faire le traitement avant l'affichage de l'interface index.php( page principale)
        $formations=self::afficher_formations();
        $_POST["formations"]=$formations;//passage des formations dans la variable post
        $cathegories=self::afficher_cathegories();
        $_POST["cathegories"]=$cathegories;//passage de cathegories dans la variable post
    }
    public static function traitement_contact()
    {//la fonction qui va faire le traitement avant l'affichage de l'interface contact.php
        $cathegories=self::afficher_cathegories();
        $_POST["cathegories"]=$cathegories;//passage de cathegories dans la variable post
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
    public static function traitement_travaille_stage()
    {//la fonction qui va faire le traitement avant l'affichage de l'interface travaille_stage.php
        $offres=self::afficher_offres();
        $_POST["offres"]=$offres;//passage de offres dans la variable post
        $cathegories=self::afficher_cathegories();
        $_POST["cathegories"]=$cathegories;//passage de cathegories dans la variable post
    }
    public static function traitement_se_connecter()
    {//la fonction qui va faire le traitement avant l'affichage de l'interface se_connecter.php
        $cathegories=self::afficher_cathegories();
        $_POST["cathegories"]=$cathegories;//passage de cathegories dans la variable post
    }
    public static function traitement_recherche()
    {//la fonction qui va faire le traitement avant l'affichage de l'interface recherche.php
        if (isset($_GET["t"])) 
        {
            $formations=self::afficher_formations_ct($_GET["t"]);
            $_POST["formations"]=$formations;//passage des formations dans la variable post
            $offres=self::afficher_offres_mc($_GET["t"]);//resoudre le probleme du fetch voire recherche.php
            $_POST["offres"]=$offres;//passage de offres dans la variable post
        }
        else if (isset($_GET["s"])) 
        {
            $formations=self::afficher_formations_mc($_GET["s"]);
            $_POST["formations"]=$formations;//passage des formations dans la variable post
            $offres=self::afficher_offres_mc($_GET["s"]);
            $_POST["offres"]=$offres;//passage de offres dans la variable post
        }
        else header('Location: index.php');
        $cathegories=self::afficher_cathegories();
        $_POST["cathegories"]=$cathegories;//passage de cathegories dans la variable post
    }
    public static function traitement_s_inscrire()
    {//la fonction qui va faire le traitement avant l'affichage de l'interface s_inscrire.php
        if (isset($_GET["formation"])) 
        {
            $formations=self::afficher_formations_id($_GET["formation"]);
            $_POST["formations"]=$formations;//passage des formations dans la variable post
            $cathegories=self::afficher_cathegories();
            $_POST["cathegories"]=$cathegories;//passage de cathegories dans la variable post
            if (isset($_POST["nom_utilisateur"]))
            {//traitement du formulaire
                self::recuperer_traiter_donnes_s_inscrire();
            }
        } 
        else header('Location:index.php');
    }
    public static function traitement_paiement()
    {//la fonction qui va faire le traitement avant l'affichage de l'interface paiement.php
        if (isset($_GET["formation"])) 
        {
            $formations=self::afficher_formations_id($_GET["formation"]);
            $_POST["formations"]=$formations;//passage des formations dans la variable post
            $cathegories=self::afficher_cathegories();
            $_POST["cathegories"]=$cathegories;//passage de cathegories dans la variable post
        } 
        else header('Location:index.php');
    }
    private static function afficher_formations()
    {
        $r=self::charger_formations();//voir data.php
        return $r;
    }
    private static function afficher_cathegories()
    {
        $r=self::charger_cathegories();//voir data.php
        return $r;
    }
    private static function afficher_offres()//voir data.php
    {
        $r=self::charger_offres();
        return $r;
    }
    private static function afficher_formations_ct($c)
    {
        $r=self::charger_formations_ct($c);//voir data.php
        return $r;
    }
    private static function afficher_formations_mc($s)
    {
        $r=self::charger_formations_mc($s);//voir data.php
        return $r;
    }
    private static function afficher_formations_id($s)
    {
        $r=self::charger_formations_id($s);//voir data.php
        return $r;
    }
    private static function afficher_offres_mc($s)
    {
        $r=self::charger_offres_mc($s);//voir data.php
        return $r;
    }
    private static function recuperer_traiter_donnes_s_inscrire()
    {//cette fonction va recuperer et traiter les données du formulaire de la page s'inscire  
        if(!preg_match('/^[A-Za-z0-9_]+$/',$_POST["nom_utilisateur"]))
        {
            $_POST["erreur"]="entrer juste chiffre/lettre/_";//si il y'a une erreur on va l'envoyer par une variable post à s_inscrire
        }
        else if(self::verifier_utilisateur($_POST["nom_utilisateur"]))
        {
            $_POST["erreur"]="nom d'utilisateur existe deja";//si il y'a une erreur on va l'envoyer par une variable post à s_inscrire
        }
        else
        {
            $formation=self::afficher_formations_id($_GET["formation"]);//récuperer la formation où l'étudiant veut s'inscrire
            $formation=$formation->fetch();
            /* ajouter l'utilisateur dans table utilisateur */
            $colone[0]=$_POST["nom_utilisateur"];
            $colone[1]=$_POST["email"];
            $colone[2]=$_POST["mot_de_pass"];
            $colone[3]="etudiant";
            self::ajouter_utilisateur($colone);
            /* ajouter l'utilisateur dans table archive_person */
            $colone[1]=$_POST["nom"];
            $colone[2]=$_POST["prenom"];
            $colone[3]=$_POST["telephone"];
            $colone[4]=$_POST["email"];
            $colone[5]=0;
            $colone[6]="un étudiant vient de s'inscrire dans la formation : ".$formation["titre_formation"];
            $colone[7]="etudiant";
            self::ajouter_archive_person($colone);
            /* ajouter l'utilisateur dans table etudiant */
            self::ajouter_etudiant($colone);
            /*envoier un email à les admins */
            $administrateurs=self::charger_utilisateur_admin();
            $message = "un utilisateure vient de s'inscrire dans la formation : ".$formation["titre_formation"];//message à envoyer
            $message = $message."\r\n";//retour à la ligne
            $message = $message."nom : ".$_POST["nom"];
            $message = $message."\r\n";//retour à la ligne
            $message = $message."prenom : ".$_POST["prenom"];
            $message = $message."\r\n";//retour à la ligne
            $message = $message."num de telephone : ".$_POST["telephone"];
            $message = $message."\r\n";//retour à la ligne
            $message = $message."l'email : ".$_POST["email"];
            $message = $message."\r\n";//retour à la ligne
            while($administrateur=$administrateurs->fetch())
            {
                mail($administrateur["email_utilisateur"], 'inscription'.$formation["titre_formation"], $message,'From: john0sloth@gmail.com');
            }
            /*envoier un email à l'utilisateur qui vient de s'inscrire*/
            $message="votre inscription à été bien enregistrer le centre axentec va vous contacter dans un maximum de 3 jours\r\n";
            $message=$message."si vous n'avez pas le temps vous pouvez les contacter en utilisant le lien suivant : axentec.com/contact";
            mail($_POST["email"], 'inscription', $message,'From: john0sloth@gmail.com');
            header('Location:paiement?formation='.$_GET["formation"]);
        } 
    }
    public static function valider_nom_utilisateur_live()
    {//cette fonction verifie nom d'utilisateur il va interagire avec fonction live_verification() dans s_inscrire 
        if(!preg_match('/^[A-Za-z0-9_]+$/',$_POST["nom_utilisateur"]))
        {
            echo "entrer juste chiffre/lettre/_";
        }
        else if(!self::verifier_utilisateur($_POST["nom_utilisateur"]))
        {
            echo "nom d'utilisateur valide";
        }
        else echo "nom d'utilisateur existe deja";
    }
    public static function bontemp ($time)
    {//la fonction qui transforme le temp en un bon text exemple :  2011/09/04 13:10:01 => il'a 1 jour
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