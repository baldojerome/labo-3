<?php

require_once ('./modele/affaireModel.php');
require_once('./vue/Vue.php');

//echo "je suis dans le controleur des affaires";

class Control_affaire
{
    function ___construct()
    {
    }

    function Init()
    {
        $affaireModel = new AffaireModel();
        $tabAffaire = $affaireModel->GetAffaire();
        $vue = new Vue();
        $vue->assign("tabAffaire", $tabAffaire);
        $vue->display('pageClientAffaire.php');
    }

}
?>