<?php

class DAO_Affaire
{
    private $db;

    function __construct()
    {
        $database = 'sqlite:./modele/CLIENT_AFFAIRE.db';
        try {
            $this->db = new PDO($database);
        } catch (PDOException $e) {
            die("erreur de connexion sur :" . $database . " " . $e->getMessage());
        }
    }

    function ConsultAffaire() : array
    {
        $req1 = "SELECT * FROM CLIENT_AFFAIRE;";
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
