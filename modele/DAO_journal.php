<?php

class DAO_Journal
{
    private $db;

    function __construct()
    {
        $database = 'sqlite:./modele/JOURNAL.db';
        try {
            $this->db = new PDO($database);
        } catch (PDOException $e) {
            die("erreur de connexion sur :" . $database . " " . $e->getMessage());
        }
    }

    function InscrireEvene($id,$libelle)
    {
        $req1 = "INSERT INTO JOURNAL (IDJOURNAL, DESCRIPTION) VALUES('$id', '$libelle');";
        ($this->db)->query($req1);
    }
    
    function ConsultJournal() : array
    {
        $req1 = "SELECT * FROM JOURNAL;";
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