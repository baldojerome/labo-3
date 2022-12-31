<?php
class DAO_Utilisateur
{
    private $db;

    function __construct()
    {
        $database = 'sqlite:./modele/UTILISATEUR.db';
        try {
            $this->db = new PDO($database);
        } catch (PDOException $e) {
            die("erreur de connexion sur :" . $database . " " . $e->getMessage());
        }
    }

    function ConsultUtil($id, $mdp) : array
    {
        $req1 = "SELECT * FROM UTILISATEUR WHERE ID = '$id' AND MDP = '$mdp';";
        $st1 = ($this->db)->query($req1);
        $tab = $st1->fetchAll (PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE) ;
        return $tab;
    }
    function DecrementCompteur($id, $compteur)
    {
        $req1 = "UPDATE UTILISATEUR SET NBR_REST = '$compteur' WHERE ID = '$id'";
        ($this->db)->query($req1);
    }

    function ChangerMDP($id, $mdp)
    {
        $req1 = "UPDATE UTILISATEUR SET MDP = '$mdp' WHERE ID = '$id'";
        ($this->db)->query($req1);
    }

    function RemettreCompteur($id)
    {
        $req1 = "UPDATE UTILISATEUR SET NBR_REST = '3' WHERE ID = '$id'";
        ($this->db)->query($req1);
    }

    function ConsultCompteur($id) : array
    {
        $req1 = "SELECT NBR_REST FROM UTILISATEUR WHERE ID = '$id';";
        $st1 = ($this->db)->query($req1);
        $tabCompte = $st1->fetchAll (PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE) ;

        return $tabCompte;
    }

    function FermerDB()
    {
        $this->db = NULL;
    }
}

?>