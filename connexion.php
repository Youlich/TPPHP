<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" />

        <title>Connexion</title>

    </head>

    <body>

    <div align="center">

        <h1>Connexion</h1>
        <br /> <br />

        <form action="verifconnexion.php" method="post">

            <table>
                <tr>
                    <td align="right">
                    <label for="pseudo">Pseudo</label>
                    </td>
                    <td>
                    <input type="text" name="pseudo" id="pseudo" />
                    </td>
                </tr>
                <tr>
                    <td align="right">
                    <label for="pass">Mot de passe</label>
                    </td>
                    <td>
                    <input type="password" name="pass" id="pass" />
                    </td>
                </tr>
               <tr>
                <td align="right">
                <label for="auto">Connexion automatique</label>
                </td>
                <td>
                <input type="checkbox" checked="true" id="case" />
                </td>
                </tr>
                <tr>
                    <td align="right">
                    </td>
                    <td>
                    <input type="submit" name= "submit" value="Se connecter" />
                    </td>
                </tr>
            </table>
            </br></br>

    </form>

    <?php

    if(isset($_GET['error']))
    {
        echo $_GET['error'];
    }
 ?>   
    </br> </br>
    <a href="inscription.php">Créer votre compte ici</a>


    </body>

</html>