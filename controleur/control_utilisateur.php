<?php

    /*echo " je suis dans le controleur utilisateur";
    echo "<br>";*/
    require_once('./vue/Vue.php');
    require_once('./modele/paramModel.php');

class Controleur_utilisateur
{
    function ___construct()
    {
    }

    function Init()
    {
        $vue = new Vue();
        $vue->display('pageConnexion.php');
    }

    function ParamSecu() : array
    {
        $paramSecu = new ParamModel();
        $tabParam = $paramSecu->GetParam();
        return $tabParam;
    }
}   
?>