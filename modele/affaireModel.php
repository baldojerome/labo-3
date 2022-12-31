<?php

    require_once ('./modele/DAO_affaire.php');
    /*echo "je suis dans le modele de affaire";
    echo "<br>";*/

    class AffaireModel{
        function __construct()
        {}
        //recuperer les parametres
        function GetAffaire() : array
        {
            $daoAffair = new DAO_Affaire();
            $tabAffair = $daoAffair->ConsultAffaire();
            $daoAffair->FermerDB();
            return $tabAffair;
        }
    }
?>