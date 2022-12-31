<?php

class DAO_Admin
{
    private $db;

    function __construct()
    {
        $database = 'sqlite:./modele/PARAMETR.db';
        try {
            $this->db = new PDO($database);
        } catch (PDOException $e) {
            die("erreur de connexion sur :" . $database . " " . $e->getMessage());
        }
    }

    function ConsultParam() : array
    {
        $req1 = "SELECT * FROM PARAMETRE;";
        $st1 = ($this->db)->query($req1);
        $tab = $st1->fetchAll (PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE) ;
        return $tab;
    }

    function ModifParam($idparam, $etat)
    {
        $req1 = "UPDATE PARAMETRE SET ETATPARAM = '$etat' WHERE IDPARAM = '$idparam';";
        $st1 = ($this->db)->query($req1);
    }
    function FermerDB()
    {
        $this->db = NULL;
    }
}

?>