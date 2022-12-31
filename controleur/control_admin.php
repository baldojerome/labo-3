<?php

require_once ('./modele/paramModel.php');
require_once ('./modele/affaireModel.php');
require_once ('./modele/residentModel.php');
require_once('./modele/DAO_utilisateur.php');
require_once('./vue/Vue.php');
require_once('./Secu.php');

/*echo " je suis dans le controleur admin";
echo "<br>";*/

class Control_admin
{
    function ___construct()
    {
    }

    function Init()
    {
        $paramSecu = new ParamModel();
        $tabParam = $paramSecu->GetParam();

        $vue = new Vue();
        $vue->assign('tabParam', $tabParam);
        $vue->display('pageAdministrateur.php');
    }

    function ModifParam($idparam, $etat)
    {
        $paramSecu = new ParamModel();
        $paramSecu->ModifParam($idparam, $etat);
    }

    function ChargerAffaire()
    {
        $paramSecu = new ParamModel();
        $tabParam = $paramSecu->GetParam();
        $affaireModel = new AffaireModel();
        $tabAffaire = $affaireModel->GetAffaire();
        $vue = new Vue();
        $vue->assign('tabParam', $tabParam);
        $vue->assign("tabAffaire", $tabAffaire);
        $vue->display('pageAdministrateur.php');
    }

    function ChargerResident()
    {
        $paramSecu = new ParamModel();
        $tabParam = $paramSecu->GetParam();
        $residentModel = new ResidentModel();
        $tabResident = $residentModel->GetResident();
        $vue = new Vue();
        $vue->assign('tabParam', $tabParam);
        $vue->assign("tabResident", $tabResident);
        $vue->display('pageAdministrateur.php');
    }
    
    function ProfilZero($id, $mdp)
    {
        $daoUtilisateur = new DAO_Utilisateur();
        $daoUtilisateur->RemettreCompteur($id);
        $secu = new Secu();
        $mdpcrypt = $secu->CryptMDP($mdp);
        $daoUtilisateur->ChangerMDP($id, $mdpcrypt);
        $paramSecu = new ParamModel();
        $tabParam = $paramSecu->GetParam();
        $vue = new Vue();
        $vue->assign('tabParam', $tabParam);
        $vue->display('pageAdministrateur.php');
    }

}
?>