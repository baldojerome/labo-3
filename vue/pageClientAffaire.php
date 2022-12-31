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
        <h2>CLIENT AFFAIRE</h2>
        <form action="./index.php" method= "post">
            <input type="submit" name="action" value="deconnexion"></input>
        </form>
        <hr>
        <p>Visualisation uniquement des clients d'affaire</p>
        <p>Cette partie est uniquement consultable</p>
        <p>Pour toutes questions veuillez contacter l'administrateur du site</p>
        <hr>
        <p> VISUALISATION DES CLIENTS D'AFFAIRE</p>
        <table>
            <tr>
                <th>IDCLIENT</th>
                <th>PRENOM</th>
                <th>NOM</th>
                <th>MAIL</th>
                <th>TEL</th>
            </tr>
            <?php
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
            ?>
        </table> 
        <hr>
    </body>

</html>