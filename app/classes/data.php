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
}
?>