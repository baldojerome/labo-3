<?php
    require_once ('./modele/residentModel.php');
    require_once('./vue/Vue.php');

    /*echo " je suis dans le controleur resident";
    echo "<br>";*/
    
class Control_residentiel
{
    function ___construct()
    {
    }

    function Init()
    {
        $residentModel = new ResidentModel();
        $tabResident = $residentModel->GetResident();
        $vue = new Vue();
        $vue->assign("tabResident", $tabResident);
        $vue->display('pageClientResidentiel.php');
    }

}
    
?>