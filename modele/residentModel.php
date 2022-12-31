<?php

    require_once ('./modele/DAO_resident.php');
    /*echo "je suis dans le modele de resident";
    echo "<br>";*/
    
    class ResidentModel{
        function __construct()
        {}
        //recuperer les parametres
        function GetResident() : array
        {
            $daoResid = new DAO_Resident();
            $tabResid = $daoResid->ConsultResident();
            $daoResid->FermerDB();
            return $tabResid;
        }
    }
?>