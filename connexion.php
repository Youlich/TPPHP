<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" />

        <title>Bienvenue sur mon blog !</title>

    </head>

    <style>

    body

    {

        text-align:center;

    }

    </style>

    <body>

    <h1>Vous êtes déjà membre ?</h1>

    <form action="verifconnexion.php" method="post">

        <p>

        <label for="pseudo">Pseudo</label> :  <input type="text" name="pseudo" id="pseudo" /><br /><br />

        <label for="pass">Mot de passe</label> : <input type="password" name="pass" id="pass" /><br /><br />

        <label for="auto">Connexion automatique</label> <input type="checkbox" checked="true" id="case" /> <br /><br />


        <input type="submit" value="Valider" />

    </p>

    </form>

    <a href="inscription.php">Créer votre compte ici</a>


    </body>

</html>