<?php

    require_once ('./modele/DAO_admin.php');
    /*echo "je suis dans le modele de parametre";
    echo "<br>";*/
    class ParamModel{
        function __construct()
        {}
        //recuperer les parametres
        function GetParam() : array
        {
            $daoParam = new DAO_Admin();
            $tabParam = $daoParam->ConsultParam();

            return $tabParam;
        }

        function ModifParam($idparam, $etat)
        {
            $daoParam = new DAO_Admin();
            $daoParam->ModifParam($idparam, $etat);
        }
    }
?>