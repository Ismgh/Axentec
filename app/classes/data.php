<?php
class data 
{
    private static $bd;//base de données instance de type PDO voire fonction connexion pour plus d'informations 
    private static function connexion()
    {//la fonction utilise la classe pdo voire plus d'informations https://www.php.net/manual/en/pdo.connections.php
        $username="root";//nom d'utilisateur de la base de données
        $password="";//mot de pass de la base de données
        $host="localhost";//le lien de host de la base de données 
        $dbname="axentec";//le nom de la base de données
        $driver="mysql";//le type de SGBD
        if (!isset(self::$bd))
        {//1x connection
            try 
            {//connexion à la base de données
                self::$bd = new PDO($driver.':host='.$host.';dbname='.$dbname,$username,$password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            }
            catch (PDOException $e) 
            {//gestion des erreur
                print "<blockquote>".$e->getMessage()."</blockquote>";
                die();
            }
        }
    }
    /*gestion de la table formation*/
    protected static function charger_formations()
    {//fonction qui récupere tous les formations disponnible de la base
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $r=$r->prepare("select * from formation");
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        }
        return $r;
    }
    protected static function ajouter_formation($colone)
    {//ajouter une formation
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette 
            $q="INSERT INTO formation (titre_formation, image_formation, petit_description_formation, grande_description_formation, promotion_formation, nombre_heure_par_seance, id_cathegorie)";
            $q.=" VALUES ( :valeur0, :valeur1, :valeur2, :valeur3, :valeur4, :valeur5, :valeur6)";
            $r=$r->prepare($q);
            $r->bindValue(':valeur0', $colone[0], PDO::PARAM_STR);
            $r->bindValue(':valeur1', $colone[1], PDO::PARAM_STR);
            $r->bindValue(':valeur2', $colone[2], PDO::PARAM_STR);
            $r->bindValue(':valeur3', $colone[3], PDO::PARAM_STR);
            $r->bindValue(':valeur4', $colone[4]);
            $r->bindValue(':valeur5', $colone[5]);
            $r->bindValue(':valeur6', $colone[6], PDO::PARAM_STR);
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print "<blockquote>".$e->getMessage()."</blockquote>";
            //echo $_POST["erreur"];
            die();
        }  
    }
    protected static function modifier_formation($colone)
    {//modifier une formation
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $q="UPDATE formation SET titre_formation = :valeur1, image_formation = :valeur2, petit_description_formation = :valeur3, grande_description_formation = :valeur4";
            $q.=", promotion_formation = :valeur5, nombre_heure_par_seance = :valeur6, id_cathegorie = :valeur7";
            $q.=" WHERE id_formation = :valeur0;";
            $r=$r->prepare($q);
            $r->bindValue(':valeur0', $colone[0]);
            $r->bindValue(':valeur1', $colone[1], PDO::PARAM_STR);
            $r->bindValue(':valeur2', $colone[2], PDO::PARAM_STR);
            $r->bindValue(':valeur3', $colone[3], PDO::PARAM_STR);
            $r->bindValue(':valeur4', $colone[4], PDO::PARAM_STR);
            $r->bindValue(':valeur5', $colone[5]);
            $r->bindValue(':valeur6', $colone[6]);
            $r->bindValue(':valeur7', $colone[7], PDO::PARAM_STR);
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        }  
    }
    protected static function supprimer_formation($id_formation)
    {//supprimer une formation
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $r=$r->prepare("DELETE FROM formation WHERE formation.id_formation = :id_formation");
            $r->bindValue(':id_formation',$id_formation);
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        }  
    }
    protected static function charger_formations_ct($c)
    {//fonction qui récupere les formation de la base de données appartient à une cathégorie
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $r=$r->prepare("select * FROM formation, cathegorie WHERE formation.id_cathegorie = cathegorie.id_cathegorie and cathegorie.id_cathegorie = :c ");
            $r->bindValue(':c', $c, PDO::PARAM_STR);
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        }
        return $r;
    }
    protected static function charger_formations_mc($s)
    {//fonction qui récupere les formation de la base de données filtrer par mot clée
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $r=$r->prepare("SELECT * FROM formation WHERE petit_description_formation LIKE :s or grande_description_formation LIKE :s or titre_formation LIKE :s");
            $s='%'.$s.'%';
            $r->bindValue(':s', $s, PDO::PARAM_STR);
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        }
        return $r;
    }
    protected static function charger_formations_id($s)
    {//fonction qui récupere les formation de la base de données filtrer par id
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $r=$r->prepare("SELECT * FROM formation WHERE  id_formation LIKE :s");
            $r->bindValue(':s', $s, PDO::PARAM_STR);
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        }
        return $r;
    }
    /*gestion de la table offres*/
    protected static function charger_offres()
    {//fonction qui récupere tous les offres de stage est de travaille dans la base de données
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $r=$r->prepare("SELECT * FROM travaille_stage");
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        }
        return $r;
    }
    protected static function ajouter_offre($colone)
    {//ajouter une offre de stage ou travaille
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette 
            $q="INSERT INTO travaille_stage (id_travaille_stage, image_travaille_stage, petite_desciption_travaille_stage, grand_description_travaille_stage)";
            $q.=" VALUES ( :valeur0, :valeur1, :valeur2, :valeur3)";
            //pour afficher les erreur error mode
            $r=$r->prepare($q);
            $r->bindValue(':valeur0', $colone[0]);
            $r->bindValue(':valeur1', $colone[1]);
            $r->bindValue(':valeur2', $colone[2]);
            $r->bindValue(':valeur3', $colone[3]);
            $r->execute();
            
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print "<blockquote>".$e->getMessage()."</blockquote>";//passage par erreur
            die();
        }  
    }
    protected static function modifier_offre($colone)
    {//modifier une offre de stage ou travaille
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette 
            $q="UPDATE travaille_stage SET id_travaille_stage = :valeur0, image_travaille_stage = :valeur1, petite_desciption_travaille_stage = :valeur2, grand_description_travaille_stage = :valeur3";
            $q.=" WHERE id_travaille_stage = :valeur4;";
            $r=$r->prepare($q);
            $r->bindValue(':valeur0', $colone[0]);
            $r->bindValue(':valeur1', $colone[1]);
            $r->bindValue(':valeur2', $colone[2]);
            $r->bindValue(':valeur3', $colone[3]);
            $r->bindValue(':valeur4', $colone[4]);
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print  "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        }  
    }
    protected static function supprimer_offre($id_travaille_stage)
    {//supprimer une offre de stage ou travaille
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $r=$r->prepare("DELETE FROM travaille_stage WHERE id_travaille_stage = :id_travaille_stage");
            $r->bindValue(':id_travaille_stage',$id_travaille_stage, PDO::PARAM_STR);
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        }  
    }
    protected static function charger_offres_mc($s)
    {//fonction qui récupere les offres de stage et travaille de la base de données filtrer par mot clée
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $r=$r->prepare("SELECT * FROM travaille_stage WHERE petite_desciption_travaille_stage LIKE :s or grand_description_travaille_stage LIKE :s or id_travaille_stage LIKE :s ");
            $s='%'.$s.'%';
            $r->bindValue(':s', $s, PDO::PARAM_STR);
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        }
        return $r;
    }
    /*gestion de la table cathegorie*/ 
    protected static function charger_cathegories()
    {//fonction qui récupere tous les cathegories de la base
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $r=$r->prepare("select * from cathegorie");
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        }
        return $r;
    } 
    /*gestion de la table utilisateur*/
    protected static function charger_utilisateurs()
    {//charger l'utilisateur identifier par son id
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $r=$r->prepare("select * from utilisateur");
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        }
        return $r;
    }
    protected static function ajouter_utilisateur($colone)
    {// ajouter un utilisateur à la base de données
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $r=$r->prepare("INSERT INTO utilisateur VALUES ( :valeur0, :valeur1, :valeur2, :valeur3)");
            $r->bindValue(':valeur0', $colone[0], PDO::PARAM_STR);
            $r->bindValue(':valeur1', $colone[1], PDO::PARAM_STR);
            $r->bindValue(':valeur2', $colone[2], PDO::PARAM_STR);
            $r->bindValue(':valeur3', $colone[3], PDO::PARAM_STR);
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        }
    }
    protected static function modifier_utilisateur($colone)
    {//modifier un utilisateur
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $q="UPDATE utilisateur SET  email_utilisateur = :valeur1, password = :valeur2, id_type = :valeur3";
            $q.=" WHERE user = :valeur0;";
            $r=$r->prepare($q);
            $r->bindValue(':valeur0', $colone[0]);
            $r->bindValue(':valeur1', $colone[1]);
            $r->bindValue(':valeur2', $colone[2]);
            $r->bindValue(':valeur3', $colone[3]);
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print  "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        }  
    }
    protected static function supprimer_utilisateur($user)
    {//supprimer un utilisateur
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $r=$r->prepare("DELETE FROM utilisateur WHERE user = :user");
            $r->bindValue(':user',$user, PDO::PARAM_STR);
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        }  
    }
    protected static function charger_utilisateur_id($nom_utilisateur)
    {//charger l'utilisateur identifier par son id
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $r=$r->prepare("select * from utilisateur WHERE user = :nom_utilisateur ");
            $r->bindValue(':nom_utilisateur',$nom_utilisateur, PDO::PARAM_STR);
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        }
        return $r;
    }
    protected static function charger_utilisateur_admin()
    {//charger tous les utilisateur de type admin dans la base de données
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $r=$r->prepare("select * from utilisateur WHERE id_type = 'administrateur' ");
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        }
        return $r;
    }
    protected static function verifier_utilisateur_1($user)
    {//fonction qui vérifie si un utilisateur existe dans la base de données
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $r=$r->prepare("select * from utilisateur WHERE user = :user ");
            $r->bindValue(':user', $user , PDO::PARAM_STR);
            $r->execute();
            $r=$r->rowCount();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        }
        return $r;
    } 
    protected static function verifier_utilisateur_2($colone)
    {//fonction qui vérifie si un utilisateur existe dans la base de données
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $r=$r->prepare("select * from utilisateur WHERE user = :valeur0 and password = :valeur1 ");
            $r->bindValue(':valeur0', $colone[0], PDO::PARAM_STR);
            $r->bindValue(':valeur1', $colone[1], PDO::PARAM_STR);
            $r->execute();
            $r=$r->rowCount();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        }
        return $r;
    } 
    /* gestion de la table etudiant */
    protected static function charger_etudiants()
    {//charger etudiant
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $r=$r->prepare("select * from etudiant");
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        }
        return $r;
    }
    protected static function ajouter_etudiant ($colone)
    {// ajouter un étudiant à la base de données
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $r=$r->prepare("INSERT INTO etudiant VALUES ( :valeur0, :valeur1, :valeur2, :valeur3, :valeur4, :valeur5)");
            $r->bindValue(':valeur0', $colone[0], PDO::PARAM_STR);
            $r->bindValue(':valeur1', $colone[1], PDO::PARAM_STR);
            $r->bindValue(':valeur2', $colone[2], PDO::PARAM_STR);
            $r->bindValue(':valeur3', $colone[3], PDO::PARAM_STR);
            $r->bindValue(':valeur4', $colone[4], PDO::PARAM_STR);
            $r->bindValue(':valeur5', $colone[5], PDO::PARAM_INT);
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        } 
    }
    protected static function modifier_etudiant($colone)
    {//modifier un etudiant
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $q="UPDATE etudiant SET nom_etudiant = :valeur1, prenom_etudiant = :valeur2, numero_telephone = :valeur3, email = :valeur4, approuver = :valeur5 ";
            $q.=" WHERE id_etudiant = :valeur0;";
            $r=$r->prepare($q);
            $r->bindValue(':valeur0', $colone[0], PDO::PARAM_STR);
            $r->bindValue(':valeur1', $colone[1], PDO::PARAM_STR);
            $r->bindValue(':valeur2', $colone[2], PDO::PARAM_STR);
            $r->bindValue(':valeur3', $colone[3], PDO::PARAM_STR);
            $r->bindValue(':valeur4', $colone[4], PDO::PARAM_STR);
            $r->bindValue(':valeur5', $colone[5], PDO::PARAM_INT);
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print  "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        }  
    }
    protected static function supprimer_etudiant($id_etudiant)
    {//supprimer un etudiant
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $r=$r->prepare("DELETE FROM etudiant WHERE id_etudiant = :id_etudiant");
            $r->bindValue(':id_etudiant',$id_etudiant, PDO::PARAM_STR);
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        }  
    }
    protected static function charger_etudiant_id($id_etudiant)
    {//charger etudiant
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $r=$r->prepare("select * from etudiant where id_etudiant = :id_etudiant");
            $r->bindValue(':id_etudiant',$id_etudiant, PDO::PARAM_STR);
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        }
        return $r;
    }
    /*gestion de la table type*/
    protected static function charger_types()
    {//charger type
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $r=$r->prepare("select * from type");
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        }
        return $r;
    }
    protected static function charger_etudiants_id_groupe($id_groupe)
    {//charger les etudiants d'un group qui sont identifiée par un id_groupe
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $r=$r->prepare("select * from etudiant e WHERE e.id_etudiant in (SELECT e_f.id_etudiant FROM etudiant_formation e_f WHERE e_f.id_groupe = :id_groupe)");
            $r->bindValue(':id_groupe',$id_groupe, PDO::PARAM_STR);
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        }
        return $r;
    }
    /*gestion de la table groupe*/
    protected static function charger_groupes()
    {//charger groupe 
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $r=$r->prepare("select * from groupe");
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        }
        return $r;
    }
    protected static function ajouter_groupe($colone)
    {// ajouter un groupe à la base de données
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $r=$r->prepare("INSERT INTO groupe VALUES ( :valeur0, :valeur1)");
            $r->bindValue(':valeur0', $colone[0], PDO::PARAM_STR);
            $r->bindValue(':valeur1', $colone[1], PDO::PARAM_STR);
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        }
    }
    protected static function modifier_groupe($colone)
    {//modifier un groupe
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $q="UPDATE groupe SET id_groupe = :valeur0, id_proffesseur = :valeur1";
            $q.=" WHERE id_groupe = :valeur2;";
            $r=$r->prepare($q);
            $r->bindValue(':valeur0', $colone[0]);
            $r->bindValue(':valeur1', $colone[1]);
            $r->bindValue(':valeur2', $colone[2]);
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print  "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        }  
    }
    protected static function supprimer_groupe($id_groupe)
    {//supprimer un groupe
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $r=$r->prepare("DELETE FROM groupe WHERE id_groupe = :id_groupe");
            $r->bindValue(':id_groupe',$id_groupe, PDO::PARAM_STR);
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        }  
    }
    /*gestion de la table des proffesseur*/
    protected static function charger_proffesseurs()
    {//charger proffesseur 
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $r=$r->prepare("select * from proffesseur");
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        }
        return $r;
    }
    protected static function ajouter_proffesseur($colone)
    {// ajouter un proffesseur à la base de données
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $r=$r->prepare("INSERT INTO proffesseur VALUES ( :valeur0, :valeur1, :valeur2, :valeur3, :valeur4, :valeur5)");
            $r->bindValue(':valeur0', $colone[0], PDO::PARAM_STR);
            $r->bindValue(':valeur1', $colone[1], PDO::PARAM_STR);
            $r->bindValue(':valeur2', $colone[2], PDO::PARAM_STR);
            $r->bindValue(':valeur3', $colone[3], PDO::PARAM_STR);
            $r->bindValue(':valeur4', $colone[4], PDO::PARAM_STR);
            $r->bindValue(':valeur5', $colone[5], PDO::PARAM_INT);
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        } 
    }
    protected static function modifier_proffesseur($colone)
    {//modifier un proffesseur
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $q="UPDATE proffesseur SET id_proffesseur = :valeur0, nom_proffesseur = :valeur1, prenom_proffesseur = :valeur2, numero_telephone = :valeur3, email = :valeur4, id_formation = :valeur5 ";
            $q.=" WHERE id_proffesseur = :valeur6;";
            $r=$r->prepare($q);
            $r->bindValue(':valeur0', $colone[0]);
            $r->bindValue(':valeur1', $colone[1]);
            $r->bindValue(':valeur2', $colone[2]);
            $r->bindValue(':valeur3', $colone[3]);
            $r->bindValue(':valeur4', $colone[4]);
            $r->bindValue(':valeur5', $colone[5]);
            $r->bindValue(':valeur6', $colone[6]);
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print  "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        }  
    }
    protected static function supprimer_proffesseur($id_proffesseur)
    {//supprimer un proffesseur
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $r=$r->prepare("DELETE FROM proffesseur WHERE id_proffesseur = :id_proffesseur");
            $r->bindValue(':id_proffesseur',$id_proffesseur, PDO::PARAM_STR);
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        }  
    }
    /*gestion de la table des archive_person*/
    protected static function charger_archive_persons()
    {//charger archive person une person qu'on a enregistrer dans la base de données
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $r=$r->prepare("select * from archive_person");
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        }
        return $r;
    }
    protected static function ajouter_archive_person($colone)
    {// ajouter un archive_person à la base de données
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $r=$r->prepare("INSERT INTO archive_person VALUES ( :valeur0, :valeur1, :valeur2, :valeur3, :valeur4, :valeur5, :valeur6, :valeur7)");
            $r->bindValue(':valeur0', $colone[0]);
            $r->bindValue(':valeur1', $colone[1]);
            $r->bindValue(':valeur2', $colone[2]);
            $r->bindValue(':valeur3', $colone[3]);
            $r->bindValue(':valeur4', $colone[4]);
            $r->bindValue(':valeur5', $colone[5]);
            $r->bindValue(':valeur6', $colone[6]);
            $r->bindValue(':valeur7', $colone[7]);
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        } 
    }
    protected static function modifier_archive_person($colone)
    {//modifier un archive_person
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $q="UPDATE archive_person SET id_person = :valeur0, nom_person = :valeur1, prenom_person = :valeur2, numero_telephone = :valeur3, email = :valeur4, approuver = :valeur5, ";
            $q.="description = :valeur6, id_type = :valeur7";
            $q.=" WHERE id_person = :valeur8;";
            $r=$r->prepare($q);
            $r->bindValue(':valeur0', $colone[0]);
            $r->bindValue(':valeur1', $colone[1]);
            $r->bindValue(':valeur2', $colone[2]);
            $r->bindValue(':valeur3', $colone[3]);
            $r->bindValue(':valeur4', $colone[4]);
            $r->bindValue(':valeur5', $colone[5]);
            $r->bindValue(':valeur6', $colone[6]);
            $r->bindValue(':valeur7', $colone[7]);
            $r->bindValue(':valeur8', $colone[8]);
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print  "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        }  
    }
    protected static function supprimer_archive_person($id_person)
    {//supprimer un archive_person
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $r=$r->prepare("DELETE FROM archive_person WHERE id_person = :id_person");
            $r->bindValue(':id_person',$id_person, PDO::PARAM_STR);
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        }  
    }
    /* gestion de la table etudiant_formation */
    protected static function charger_etudiant_formations()
    {//charger etudiant_formation 
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $r=$r->prepare("select * from etudiant_formation");
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        }
        return $r;
    }
    protected static function ajouter_etudiant_formation($colone)
    {// ajouter un etudiant_formation à la base de données
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $r=$r->prepare("INSERT INTO etudiant_formation VALUES ( :valeur0, :valeur1, :valeur2, :valeur3, :valeur4, :valeur5, :valeur6, :valeur7, :valeur8, :valeur9, :valeur10, :valeur11)");
            $r->bindValue(':valeur0', $colone[0]);
            $r->bindValue(':valeur1', $colone[1]);
            $r->bindValue(':valeur2', $colone[2]);
            $r->bindValue(':valeur3', $colone[3]);
            $r->bindValue(':valeur4', $colone[4]);
            $r->bindValue(':valeur5', $colone[5]);
            $r->bindValue(':valeur6', $colone[6]);
            $r->bindValue(':valeur7', $colone[7]);
            $r->bindValue(':valeur8', $colone[8]);
            $r->bindValue(':valeur9', $colone[9]);
            $r->bindValue(':valeur10', $colone[10]);
            $r->bindValue(':valeur11', $colone[11]);
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        } 
    }
    protected static function modifier_etudiant_formation($colone)
    {//modifier un etudiant_formation
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $q="UPDATE etudiant_formation SET id_formation = :valeur0, id_etudiant = :valeur1, nombre_sceance_present = :valeur2, nombre_sceance_absent = :valeur3, nombre_heures_par_seance = :valeur4, seance_1 = :valeur5, ";
            $q.="seance_2 = :valeur6, seance_3 = :valeur7, seance_4 = :valeur8, seance_5 = :valeur9, seance_6 = :valeur10, id_groupe = :valeur11";
            $q.=" WHERE id_formation = :valeur12 and id_etudiant = :valeur13 ; ";
            $r=$r->prepare($q);
            $r->bindValue(':valeur0', $colone[0]);
            $r->bindValue(':valeur1', $colone[1]);
            $r->bindValue(':valeur2', $colone[2]);
            $r->bindValue(':valeur3', $colone[3]);
            $r->bindValue(':valeur4', $colone[4]);
            $r->bindValue(':valeur5', $colone[5]);
            $r->bindValue(':valeur6', $colone[6]);
            $r->bindValue(':valeur7', $colone[7]);
            $r->bindValue(':valeur8', $colone[8]);
            $r->bindValue(':valeur9', $colone[9]);
            $r->bindValue(':valeur10', $colone[10]);
            $r->bindValue(':valeur11', $colone[11]);
            $r->bindValue(':valeur12', $colone[12]);
            $r->bindValue(':valeur13', $colone[13]);
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print  "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        }  
    }
    protected static function supprimer_etudiant_formation($id_formation,$id_etudiant)
    {//supprimer un etudiant_formation
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $r=$r->prepare("DELETE FROM etudiant_formation WHERE id_formation = :id_formation and id_etudiant = :id_etudiant");
            $r->bindValue(':id_formation',$id_formation);
            $r->bindValue(':id_etudiant',$id_etudiant);
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        }  
    }
    protected static function charger_etudiant_formation_id($id_formation,$id_etudiant)
    {//charger un etudiant_formation par id
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $r=$r->prepare("select * from etudiant_formation WHERE id_formation = :id_formation and id_etudiant = :id_etudiant");
            $r->bindValue(':id_formation',$id_formation);
            $r->bindValue(':id_etudiant',$id_etudiant);
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        }
        return $r;  
    }
    protected static function charger_etudiant_formation_id_etudiant($id_etudiant)
    {//charger un etudiant_formation par id_etudiant
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $r=$r->prepare("SELECT * from etudiant_formation ef,formation f WHERE ef.id_formation=f.id_formation and ef.id_etudiant=:id_etudiant");
            $r->bindValue(':id_etudiant',$id_etudiant);
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        }
        return $r;  
    }
    protected static function verifier_etudiant_formation_id_etudiant($id_etudiant)
    {//charger un s'il existe un etudiant est approuvée par l'administrateur
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $r=$r->prepare("select * from etudiant_formation WHERE  id_etudiant = :id_etudiant");
            $r->bindValue(':id_etudiant',$id_etudiant);
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        }
        return $r->rowCount();  
    }
    protected static function modifier_etudiant_formation_groupe($colone)
    {//modifier un les informations d'un group
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $q="UPDATE etudiant_formation SET   nombre_heures_par_seance = :valeur0, seance_1 = :valeur1, ";
            $q.="seance_2 = :valeur2, seance_3 = :valeur3, seance_4 = :valeur4, seance_5 = :valeur5, seance_6 = :valeur6";
            $q.=" WHERE  id_groupe = :valeur7 ; ";
            $r=$r->prepare($q);
            $r->bindValue(':valeur0', $colone[0]);
            $r->bindValue(':valeur1', $colone[1]);
            $r->bindValue(':valeur2', $colone[2]);
            $r->bindValue(':valeur3', $colone[3]);
            $r->bindValue(':valeur4', $colone[4]);
            $r->bindValue(':valeur5', $colone[5]);
            $r->bindValue(':valeur6', $colone[6]);
            $r->bindValue(':valeur7', $colone[7]);
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print  "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        }  
    }
}
?>