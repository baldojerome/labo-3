<?php 

require_once('./modele/DAO_utilisateur.php');

class Secu{

    

    function __construct()
    {  
    }
    
    function ConsultCompteur($id) : array
    {
        $daoUtilisateur = new DAO_Utilisateur();
        $tabCompt = $daoUtilisateur->ConsultCompteur($id);
        return $tabCompt;
    }

    function DelaiComparaison($id, $mdp) :bool
    {
        $daoUtilisateur = new DAO_Utilisateur();
        $verif = true;
        $tabCompt = $daoUtilisateur->ConsultCompteur($id);
        $mdpCrypt = $this->CryptMDP($mdp);
        $compteur = intval($tabCompt[0]->NBR_REST);
        //$compteur = 4;
        $tabUtil = $daoUtilisateur->ConsultUtil($id, $mdpCrypt);
        if($tabUtil == NULL && $compteur > 0 )
        {
            $verif = false;
            $compteur--;
            echo "ID / MDP INCORRECTS" . "<br>";
            echo "Tentatives restantes : " . $compteur . "<br>";
            $daoUtilisateur->DecrementCompteur($id, $compteur);
            sleep(5);
        }
        if($tabUtil == NULL && $compteur == 0)
        {
            $verif = false;
            echo "COMPTE BLOQUE / VEUILLEZ CONTACTER L'ADMINISTRATEUR DU SITE" . "<br>";
            sleep(5);
        }
        
        return $verif;
    }

    function Comparaison($id, $mdp) :bool
    {
        $daoUtilisateur = new DAO_Utilisateur();
        $verif = true;
        $mdpCrypt = $this->CryptMDP($mdp);
        
        $tabUtil = $daoUtilisateur->ConsultUtil($id, $mdpCrypt);
        if($tabUtil == NULL)
        {
            $verif = false;
            echo "ID / MDP INCORRECTS" . "<br>";
        }
            
        return $verif;
    }

    function CryptMDP($mdp)
    {
        $mdpRetransc = crypt($mdp,'$1$salt$');
        $mdpCrypte = substr($mdpRetransc, 8);

        return $mdpCrypte;
    }
}
?>
