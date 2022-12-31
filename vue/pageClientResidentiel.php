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
        <h2>CLIENT RESIDENTIEL</h2>
        <form action="./index.php" method= "post">
            <input type="submit" name="action" value="deconnexion"></input>
        </form>
        <hr>
        <p>Visualisation uniquement des clients résidentiels</p>
        <p>Cette partie est uniquement consultable</p>
        <p>Pour toutes questions veuillez contacter l'administrateur du site</p>
        <hr>
        <p> VISUALISATION DES CLIENTS RESIDENTIELS</p>
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
            ?>
        </table> 
        <hr>
    </body>

</html>