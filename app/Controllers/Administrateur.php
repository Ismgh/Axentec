<?php
class Administrateur extends Controller 
{//la classe qui contient toutes les fonctions qui va servire pour l'interface administrateur
    public static function traitement()
    {//traitement avant l'affichage
        session_start();
        if ($_SESSION["utilisateur"]["id_type"]!="administrateur") self::logout();
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
    public static function stage_et_travaille_traitement()
    { 
        if(isset($_GET["supprimer"])) self::supprimer_offre($_GET["supprimer"]);//pour supprimer une offre
        if (isset($_POST["modifier"])) 
        {
            /* remplir la colone */
            $colone[0]=$_POST["id_travaille_stage"];
            $colone[1]=$_POST["image_travaille_stage"];//se deberraser des espaces
            $colone[2]=$_POST["petite_desciption_travaille_stage"];
            $colone[3]=$_POST["grand_description_travaille_stage"];
            $colone[4]=$_POST["id_travaille_stage_an"];
            self::modifier_offre($colone);//voir data
        }
        if (isset($_POST["ajouter"])) 
        {
            /* remplir la colone */
            $colone[0]=$_POST["id_travaille_stage"];
            $colone[1]=$_POST["image_travaille_stage"];//se deberraser des espaces
            $colone[2]=$_POST["petite_desciption_travaille_stage"];
            $colone[3]=$_POST["grand_description_travaille_stage"];
            self::ajouter_offre($colone);
        }
        $offres=self::charger_offres();
        $_POST["offres"]=$offres;//passage de offres dans la variable post
    }
    public static function utilisateur_traitement()
    { 
        if(isset($_GET["supprimer"])) self::supprimer_utilisateur($_GET["supprimer"]);//pour supprimer une offre
        if (isset($_POST["modifier"])) 
        {
            /* remplir la colone */
            $colone[0]=$_POST["user"];
            $colone[1]=$_POST["email_utilisateur"];//se deberraser des espaces
            $colone[2]=$_POST["password"];
            $colone[3]=$_POST["id_type"];
            $colone[4]=$_POST["user_an"];
            self::modifier_utilisateur($colone);//voir data
        }
        if (isset($_POST["ajouter"])) 
        {
            /* remplir la colone */
            $colone[0]=$_POST["user"];
            $colone[1]=$_POST["email_utilisateur"];//se deberraser des espaces
            $colone[2]=$_POST["password"];
            $colone[3]=$_POST["id_type"];
            self::ajouter_utilisateur($colone);
        }
        $utilisateurs=self::charger_utilisateurs();
        $_POST["utilisateurs"]=$utilisateurs;//passage de utilisateurs dans la variable post
        $types=self::charger_types();
        $_POST["types"]=$types;//passage de utilisateurs dans la variable post
    }
    public static function etudiant_traitement()
    { 
        if(isset($_GET["supprimer"])) self::supprimer_etudiant($_GET["supprimer"]);//pour supprimer une offre
        if (isset($_POST["modifier"])) 
        {
            /* remplir la colone */
            $colone[0]=$_POST["id_etudiant"];
            $colone[1]=$_POST["nom_etudiant"];
            $colone[2]=$_POST["prenom_etudiant"];
            $colone[3]=$_POST["numero_telephone"];
            $colone[4]=$_POST["email"];
            $colone[5]=$_POST["approuver"];
            self::modifier_etudiant($colone);//voir data
        }
        $etudiants=self::charger_etudiants();
        $_POST["etudiants"]=$etudiants;//passage de utilisateurs dans la variable post
    }
    public static function groupe_traitement()
    {
        if(isset($_GET["supprimer"])) self::supprimer_groupe($_GET["supprimer"]);//pour supprimer un groupe
        if (isset($_POST["modifier"])) 
        {
            /* remplir la colone */
            $colone[0]=$_POST["id_groupe"];
            $colone[1]=$_POST["id_proffesseur"];//se deberraser des espaces
            $colone[2]=$_POST["id_groupe_an"];
            self::modifier_groupe($colone);//voir data
        }
        if (isset($_POST["ajouter"])) 
        {
            /* remplir la colone */
            $colone[0]=$_POST["id_groupe"];
            $colone[1]=$_POST["id_proffesseur"];//se deberraser des espaces
            self::ajouter_groupe($colone);
        }
        $groupes=self::charger_groupes();
        $_POST["groupes"]=$groupes;//passage de groupes dans la variable post
        $proffesseurs=self::charger_proffesseurs();
        $_POST["proffesseurs"]=$proffesseurs;//passage de proffesseurs dans la variable post
    }
    public static function enseignant_traitement()
    {
        if(isset($_GET["supprimer"])) self::supprimer_proffesseur($_GET["supprimer"]);//pour supprimer un proffesseur
        if (isset($_POST["modifier"])) 
        {
            /* remplir la colone */
            $colone[0]=$_POST["id_proffesseur"];
            $colone[1]=$_POST["nom_proffesseur"];
            $colone[2]=$_POST["prenom_proffesseur"];
            $colone[3]=$_POST["numero_telephone"];
            $colone[4]=$_POST["email"];
            $colone[5]=$_POST["id_formation"];
            $colone[6]=$_POST["id_proffesseur_an"];
            self::modifier_proffesseur($colone);//voir data
        }
        if (isset($_POST["ajouter"])) 
        {
            /* remplir la colone */
            $colone[0]=$_POST["id_proffesseur"];
            $colone[1]=$_POST["nom_proffesseur"];
            $colone[2]=$_POST["prenom_proffesseur"];
            $colone[3]=$_POST["numero_telephone"];
            $colone[4]=$_POST["email"];
            $colone[5]=$_POST["id_formation"];
            self::ajouter_proffesseur($colone);
        }
        $proffesseurs=self::charger_proffesseurs();
        $_POST["proffesseurs"]=$proffesseurs;//passage de proffesseurs dans la variable post
        $formations=self::charger_formations();
        $_POST["formations"]=$formations;//passage des formations dans la variable post
    }
    public static function archive_person_traitement()
    {
        if(isset($_GET["supprimer"])) self::supprimer_archive_person($_GET["supprimer"]);//pour supprimer un archive_person
        if (isset($_POST["modifier"])) 
        {
            /* remplir la colone */
            $colone[0]=$_POST["id_person"];
            $colone[1]=$_POST["nom_person"];
            $colone[2]=$_POST["prenom_person"];
            $colone[3]=$_POST["numero_telephone"];
            $colone[4]=$_POST["email"];
            $colone[5]=$_POST["approuver"];
            $colone[6]=$_POST["description"];
            $colone[7]=$_POST["id_type"];
            $colone[8]=$_POST["id_person_an"];
            self::modifier_archive_person($colone);//voir data
        }
        if (isset($_POST["ajouter"])) 
        {
            /* remplir la colone */
            $colone[0]=$_POST["id_person"];
            $colone[1]=$_POST["nom_person"];
            $colone[2]=$_POST["prenom_person"];
            $colone[3]=$_POST["numero_telephone"];
            $colone[4]=$_POST["email"];
            $colone[5]=$_POST["approuver"];
            $colone[6]=$_POST["description"];
            $colone[7]=$_POST["id_type"];
            self::ajouter_archive_person($colone);
        }
        $archive_persons=self::charger_archive_persons();
        $_POST["archive_persons"]=$archive_persons;//passage de proffesseurs dans la variable post
        $types=self::charger_types();
        $_POST["types"]=$types;//passage de utilisateurs dans la variable post
    }
    public static function etudiant_formation_traitement()
    {
        if(isset($_GET["supprimer1"])) self::supprimer_etudiant_formation($_GET["supprimer1"],$_GET["supprimer2"]);//pour supprimer un archive_person
        if (isset($_POST["modifier"])) 
        {
            /* remplir la colone */
            $colone[0]=$_POST["id_formation"];
            $colone[1]=$_POST["id_etudiant"];
            $colone[2]=$_POST["nombre_sceance_present"];
            $colone[3]=$_POST["nombre_sceance_absent"];
            $colone[4]=$_POST["nombre_heures_par_seance"];
            $colone[5]=$_POST["seance_1"];
            $colone[6]=$_POST["seance_2"];
            $colone[7]=$_POST["seance_3"];
            $colone[8]=$_POST["seance_4"];
            $colone[9]=$_POST["seance_5"];
            $colone[10]=$_POST["seance_6"];
            $colone[11]=$_POST["id_groupe"];
            $colone[12]=$_POST["id_formation_an"];
            $colone[13]=$_POST["id_etudiant_an"];
            self::envoier_mail();//envoier un mail à l'étudiant pour lui informer à propos de la modification et au groups en cas de changememnt de seance 
            self::modifier_etudiant_formation($colone);//voir data 
        }
        if (isset($_POST["ajouter"])) 
        {
            /* remplir la colone */
            $colone[0]=$_POST["id_formation"];
            $colone[1]=$_POST["id_etudiant"];
            $colone[2]=$_POST["nombre_sceance_present"];
            $colone[3]=$_POST["nombre_sceance_absent"];
            $colone[4]=$_POST["nombre_heures_par_seance"];
            $colone[5]=$_POST["seance_1"];
            $colone[6]=$_POST["seance_2"];
            $colone[7]=$_POST["seance_3"];
            $colone[8]=$_POST["seance_4"];
            $colone[9]=$_POST["seance_5"];
            $colone[10]=$_POST["seance_6"];
            $colone[11]=$_POST["id_groupe"];
            self::ajouter_etudiant_formation($colone);
        }
        $etudiant_formations=self::charger_etudiant_formations();
        $_POST["etudiant_formations"]=$etudiant_formations;//passage des etudiant_formations dans la variable post
        $formations=self::charger_formations();
        $_POST["formations"]=$formations;//passage des formations dans la variable post
        $groupes=self::charger_groupes();
        $_POST["groupes"]=$groupes;//passage de groupes dans la variable post
        $etudiants=self::charger_etudiants();
        $_POST["etudiants"]=$etudiants;//passage de utilisateurs dans la variable post
    }
    private static function envoier_mail()
    {
        /* etape uno envoier l'email à l'étudiant */
        $etudiant=self::charger_etudiant_id($_POST["id_etudiant"]);
        $etudiant=$etudiant->fetch();
        $formation=self::charger_formations_id($_POST["id_formation"]);
        $formation=$formation->fetch();
        //construire le message
        $message=" Axentec  \r\n nous voulons vous informer que l'administrateur a changée l'un de vous données \r\n";
        $message = $message."Nous vous invitons à réviser ses données pour nous informer en cas d'erreur et de consulter votre compte dans notre site Axentec \r\n"; 
        $message = $message."la formation que vous suivez : ".$formation["titre_formation"]."\r\n";
        $message = $message."nombre de sceance present : ".$_POST["nombre_sceance_present"]."\r\n";
        $message = $message."nombre de sceance absent : ".$_POST["nombre_sceance_absent"]."\r\n";
        $message = $message."nombre d'heures par seance : ".$_POST["nombre_heures_par_seance"]."\r\n";
        if($_POST["seance_1"]!="") $message = $message."date et heure de sceance 1 : ".$_POST["seance_1"]."\r\n";
        if($_POST["seance_2"]!="") $message = $message."date et heure de sceance 2 : ".$_POST["seance_2"]."\r\n";
        if($_POST["seance_3"]!="") $message = $message."date et heure de sceance 3 : ".$_POST["seance_3"]."\r\n";
        if($_POST["seance_4"]!="") $message = $message."date et heure de sceance 4 : ".$_POST["seance_4"]."\r\n";
        if($_POST["seance_5"]!="") $message = $message."date et heure de sceance 5 : ".$_POST["seance_5"]."\r\n";
        if($_POST["seance_6"]!="") $message = $message."date et heure de sceance 6 : ".$_POST["seance_6"]."\r\n";
        $message = $message."votre groupe : ".$_POST["id_groupe"]."\r\n";
        $message = $message."Merci  ".$etudiant["nom_etudiant"]." ".$etudiant["prenom_etudiant"];
        mail($etudiant["email"], 'verification & consultation', $message,'From: john0sloth@gmail.com');
        /* etape dos envoier l'email à tous les autres étudiants qui appartenait aux meme group si les seances ont changé*/
        //problem de fetch
        $etudiant_formation=self::charger_etudiant_formation_id($_POST["id_formation"],$_POST["id_etudiant"]);
        $etudiant_formation=$etudiant_formation->fetch();
        //verifier si l'un de ses informations a changée
        $test=($_POST["seance_1"]!=$etudiant_formation["seance_1"]||$_POST["seance_2"]!=$etudiant_formation["seance_2"]);
        $test=($_POST["seance_4"]!=$etudiant_formation["seance_4"]||$_POST["seance_3"]!=$etudiant_formation["seance_3"]||$test);
        $test=($_POST["seance_5"]!=$etudiant_formation["seance_5"]||$_POST["seance_6"]!=$etudiant_formation["seance_6"]||$test);
        $test=($_POST["nombre_heures_par_seance"]!=$etudiant_formation["nombre_heures_par_seance"]||$test);
        //construire le message(groupe)
        $message=" Axentec  \r\n nous voulons vous informer que l'administrateur a changée l'un de vous données \r\n";
        $message = $message."Nous vous invitons à réviser ses données pour nous informer en cas d'erreur et de consulter votre compte dans notre site Axentec \r\n"; 
        $message = $message."la formation que vous suivez : ".$formation["titre_formation"]."\r\n";
        $message = $message."nombre d'heures par seance : ".$_POST["nombre_heures_par_seance"]."\r\n";
        if($_POST["seance_1"]!="") $message = $message."date et heure de sceance 1 : ".$_POST["seance_1"]."\r\n";
        if($_POST["seance_2"]!="") $message = $message."date et heure de sceance 2 : ".$_POST["seance_2"]."\r\n";
        if($_POST["seance_3"]!="") $message = $message."date et heure de sceance 3 : ".$_POST["seance_3"]."\r\n";
        if($_POST["seance_4"]!="") $message = $message."date et heure de sceance 4 : ".$_POST["seance_4"]."\r\n";
        if($_POST["seance_5"]!="") $message = $message."date et heure de sceance 5 : ".$_POST["seance_5"]."\r\n";
        if($_POST["seance_6"]!="") $message = $message."date et heure de sceance 6 : ".$_POST["seance_6"]."\r\n";
        $message = $message."votre groupe : ".$_POST["id_groupe"]."\r\n";
        if($test)
        {
            /* remplire la colone */
            $colone[0]=$_POST["nombre_heures_par_seance"];
            $colone[1]=$_POST["seance_1"];
            $colone[2]=$_POST["seance_2"];
            $colone[3]=$_POST["seance_3"];
            $colone[4]=$_POST["seance_4"];
            $colone[5]=$_POST["seance_5"];
            $colone[6]=$_POST["seance_6"];
            $colone[7]=$_POST["id_groupe"];
            $etudiants=self::charger_etudiants_id_groupe($_POST["id_groupe"]);//charger tous les etudiant du meme groupe
            while ($etudiant = $etudiants->fetch()) 
            {
                self::modifier_etudiant_formation_groupe($colone);//modifier chaque persone
                mail($etudiant["email"], 'verification & consultation', $message,'From: john0sloth@gmail.com');
            }
            
        }
        
    }
}
?>