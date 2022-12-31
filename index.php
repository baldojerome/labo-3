<?php

require_once ('./controleur/control_utilisateur.php');
require_once ('./controleur/control_residentiel.php');
require_once ('./controleur/control_affaire.php');
require_once ('./controleur/control_admin.php');
require_once('./Secu.php');

    $controlUtili = new Controleur_utilisateur();

    if(empty($_POST) || $_POST["action"] == "deconnexion")
    {
        $controlUtili->Init();
    }
    else
    {      
        if($_POST["action"] == "connexion")
        {
            
            $tabParam = $controlUtili->ParamSecu();
            $secu = new Secu();
            //verifcation du mot de passe selon le parametre delai 
            if($tabParam[0]->ETATPARAM == "1")
            {
                $verif = $secu->DelaiComparaison($_POST['id'], $_POST['mdp']);
            }
            else
            {
                $verif = $secu->Comparaison($_POST['id'], $_POST['mdp']);
            }

            if($verif == false)
            {
                $controlUtili->Init();
                //rajouter dans journal
            }
            else
            {
                //rajouter dans journal
                //controleur selon les parametres
                if($_POST['id'] == 'utilisateur1')
                {
                    $clientAffaire = new Control_affaire();
                    $clientAffaire->Init();
                }
                if($_POST['id'] == 'utilisateur2')
                {
                    $clientResident = new Control_residentiel();
                    $clientResident->Init();
                }
                if($_POST['id'] == 'administrateur')
                {
                    $admin = new Control_admin();
                    $admin->Init();
                }
            }
            
        }
        if($_POST["action"] == "VALIDER")
        {
            $admin = new Control_admin();
            //verifier les conditions 
            if(isset($_POST['DELAI_TENTATIVE']))
            {
                //remodifie en true 
                $admin->ModifParam("DELAI_TENTATIVE", true);
            }
            else
            {
                //remodifie en false
                $admin->ModifParam("DELAI_TENTATIVE", false);
            }
            if(isset($_POST['CHANG_MDP']))
            {
                //remodifie en true 
                $admin->ModifParam("CHANG_MDP", true);
            }
            else
            {
                //remodifie en false
                $admin->ModifParam("CHANG_MDP", false);
            }
            if(isset($_POST['COMPLEX_MDP']))
            {
                //remodifie en true 
                $admin->ModifParam("COMPLEX_MDP", true);
            }
            else
            {
                //remodifie en false
                $admin->ModifParam("COMPLEX_MDP", false);
            }
            
            $admin->Init();
            //rajouter modif
            
        }
        if($_POST["action"] == "AFFAIRE")
        {
            //echo "on charge la table des affaires";
            $admin = new Control_admin();
            $admin->ChargerAffaire(); 
        }
        if($_POST["action"] == "RESIDENTIEL")
        {
            //echo "on charge la table résidentiel";
            $admin = new Control_admin();
            $admin->ChargerResident();
        }
        if($_POST["action"] == "MODIF-PROFIL")
        {
            echo "je modifie un utilisateur" . "<br>";
            //echo $_POST['id'];
            //echo $_POST['mdp'];
            $admin = new Control_admin();
            $admin->ProfilZero($_POST['id'], $_POST['mdp']);
            //rajouter dans journal
        }
        
    }
?>