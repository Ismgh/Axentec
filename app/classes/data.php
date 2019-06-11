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
                self::$bd = new PDO($driver.':host='.$host.';dbname='.$dbname,$username,$password);
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
    protected static function ajouter_utilisateur($colone)
    {// ajouter un utilisateur à la base de données
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $colone[2]=hash('sha256',$colone[2]);//la fonction de hashage 256 voire https://www.php.net/manual/en/function.hash.php
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
            $colone[1]=hash('sha256',$colone[1]);//la fonction de hashage 256 voire https://www.php.net/manual/en/function.hash.php
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
    /* gestion de la table archive_person */
    protected static function ajouter_archive_person ($colone)
    {// ajouter un archive à la base de données
        self::connexion();
        $r=self::$bd;
        try 
        {//preparation et execution de la requette
            $r=$r->prepare("INSERT INTO archive_person VALUES ( :valeur0, :valeur1, :valeur2, :valeur3, :valeur4, :valeur5, :valeur6, :valeur7)");
            $r->bindValue(':valeur0', $colone[0], PDO::PARAM_STR);
            $r->bindValue(':valeur1', $colone[1], PDO::PARAM_STR);
            $r->bindValue(':valeur2', $colone[2], PDO::PARAM_STR);
            $r->bindValue(':valeur3', $colone[3], PDO::PARAM_STR);
            $r->bindValue(':valeur4', $colone[4], PDO::PARAM_STR);
            $r->bindValue(':valeur5', $colone[5], PDO::PARAM_INT);
            $r->bindValue(':valeur6', $colone[6], PDO::PARAM_STR);
            $r->bindValue(':valeur7', $colone[7], PDO::PARAM_STR);
            $r->execute();
        }
        catch (PDOException $e) 
        {//gestion des erreur
            print "<blockquote>".$e->getMessage()."</blockquote>";
            die();
        } 
    }
    /* gestion de la table etudiant */
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
}
?>