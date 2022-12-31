<!DOCTYPE html>
<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8" />
        <meta name="author" content="Jérôme Baldo" />
    </head>

    <body>
        <h1>LABORATOIRE#3 - AUTHENTIFICATION/GESTION SESSION</h1>
        <hr>
        <h2>ADMINISTRATION</h2>
        <form action="./index.php" method= "get">
            <input type="submit" name="action" value="deconnexion"></input>
        </form>
        <hr>
        <p>Ceci est la page d'administration de l'application</p>
        <p>Vous pouvez paramètrer la sécurité sur l'authentification et la gestion du mot de passe de l'utilisateur</p>
        <p>L'administrateur peut aussi visualiser les données de toutes l'application</p>
        <p>Le bouton déconnexion permet de se déconnecter de la page </p>
        <hr>
        <form action="./index.php" method= "post">
            <input type="text" name="id" value=""></input>
            <input  type="text" name="mdp" value=""></input>
            <input type="submit" name="action" value="MODIF-PROFIL"></input> 
        </form>
        <hr>
        <form action="./index.php" method= "post">
        <?php
            $tab = array("Délai par utilisateur en fonction du nombre de tentatives", "Changement de mot de passe", "Complexité du mot de passe");
            $increment = 0;
            $tabParam = $this->param['tabParam'];
    
            foreach($tabParam as $key => $value)
            {
                if($tabParam[$key]->ETATPARAM == '1')
                {
                    echo '<input type="checkbox" id=' . $tabParam[$key]->IDPARAM . ' name=' . $tabParam[$key]->IDPARAM . ' value=' . $tabParam[$key]->IDPARAM . ' checked=ckecked>';
                }
                else
                {
                    echo '<input type="checkbox" id=' . $tabParam[$key]->IDPARAM  . ' name=' . $tabParam[$key]->IDPARAM . ' value=' . $tabParam[$key]->IDPARAM . '>'; 
                }
                echo '<label for=' . $tabParam[$key]->IDPARAM . '>' . $tab[$increment] . '</label><br>';
                $increment++;
            }
        ?>
            
        <input type="submit" name="action" value="VALIDER"></input>
        </form> 
        <hr>
        <p>JOURNALISATION</p>
        <hr>
        <p>TABLEAU DE VISUALISATION RESIDENTIEL ou AFFAIRE </p>
        <form action="./index.php" method= "post">
            <input type="submit" name="action" value="AFFAIRE"></input>
            <input type="submit" name="action" value="RESIDENTIEL"></input>
        </form>
        <table>
            <tr>
                <th>IDCLIENT</th>
                <th>PRENOM</th>
                <th>NOM</th>
                <th>MAIL</th>
                <th>TEL</th>
            </tr>
        <?php
                
                if(isset($this->param["tabAffaire"]))
                {
                    $increment = 0;
                    $tabAffaire = $this->param["tabAffaire"];
                    foreach($tabAffaire as $key => $value)
                    {
                        echo "<tr>";
                        echo '<td>' . $tabAffaire[$key]->IDCLIENT . '</td>';
                        echo '<td>' . $tabAffaire[$key]->NOM . '</td>';
                        echo '<td>' . $tabAffaire[$key]->PRENOM . '</td>';
                        echo '<td>' . $tabAffaire[$key]->MAIL . '</td>';
                        echo '<td>' . $tabAffaire[$key]->TELEPHONE . '</td>';
                        echo "</tr>";
                    }
                }
                if(isset($this->param["tabResident"]))
                {
                    $increment = 0;
                    $tabResident = $this->param["tabResident"];
                    foreach($tabResident as $key => $value)
                    {
                        echo "<tr>";
                        echo '<td>' . $tabResident[$key]->IDCLIENT . '</td>';
                        echo '<td>' . $tabResident[$key]->NOM . '</td>';
                        echo '<td>' . $tabResident[$key]->PRENOM . '</td>';
                        echo '<td>' . $tabResident[$key]->MAIL . '</td>';
                        echo '<td>' . $tabResident[$key]->TELEPHONE . '</td>';
                        echo "</tr>";
                    }
                }  
            ?>
            </table>
        <hr>
    </body>

</html>