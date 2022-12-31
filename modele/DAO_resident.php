<?php

class DAO_Resident
{
    private $db;

    function __construct()
    {
        $database = 'sqlite:./modele/CLIENT_RESID.db';
        try {
            $this->db = new PDO($database);
        } catch (PDOException $e) {
            die("erreur de connexion sur :" . $database . " " . $e->getMessage());
        }
    }

    function ConsultResident() : array
    {
        $req1 = "SELECT * FROM CLIENT_RESID;";
        $st1 = ($this->db)->query($req1);
        $tab = $st1->fetchAll (PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE) ;
        return $tab;
    }

    function FermerDB()
    {
        $this->db = NULL;
    }
}
?>