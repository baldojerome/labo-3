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
        <h2>CONNEXION</h2>
        <hr>
        <p>Veuillez rentrer votre identifiant et votre mot de passe</p>
        <p>3 échecs de connexions vous bloque l'accès.</p>
        <p>Pour toutes demandes, veuillez contacter l'administrateur du site</p>
        <hr>
        <form action="./index.php" method= "post">
            <p>Identifiant
            <input type="text" name="id" value=""></input></p>
            <p>Mot de passe 
            <input type="text" name="mdp" value=""></input></p>
            <input type="submit" name="action" value="connexion"></input>
        </form>
    </body>

</html>
