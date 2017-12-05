

<!DOCTYPE html>

<html>

    <head>

        <link rel="stylesheet" type="text/css" href="inscription.css">

        <meta charset="utf-8" />

        <title>Inscription en tant que membre</title>

    </head>

       <body>

    <div align="center">

    <h1>Inscription</h1>
    <br /> <br />

    <form action="verifinscription.php" method="post">

        <table>
            <tr>
                <td align="right">
                <label for="pseudo">Pseudo</label> 
                </td>
                <td>
                <input type="text" placeholder="Votre pseudo" name="pseudo" id="pseudo"/>
                </td>
            </tr>
            <tr>
                <td align="right">
                <label for="pass">Mot de passe</label>
                </td>
                <td>
                <input type="password" placeholder="Votre mot de passe" name="pass" id="pass" />
                </td>
            </tr>
            <tr>
                <td align="right">
                <label for="pass">Retapez votre mot de passe</label>
                </td>
                <td>
                <input type="password" placeholder="Confirmation mot de passe" name="newpass" id="newpass" />
                </td>
            </tr>
            <tr>
                <td align="right">
                <label for="email">Adresse e-mail</label> 
                </td>
                <td>
                <input type="text" placeholder="Votre adresse mail" name="email" id="email" />
                </td>
            </tr>
            <tr>
                <td align="right">
                <label for="type_membre">Vous souhaitez devenir </label>
                </td>
                <td>
                <SELECT name="type_membre" id="type_membre">
                <OPTION>membre
                <OPTION>administrateur
                <OPTION>contributeur</SELECT>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    </br></br>
                <input type="submit" name="submit" value="S'inscrire" />    
                </td>
            </tr>
        </table>
               
    </form>

    </div>

<?php

    if(isset($_GET['error']))
    {
        echo $_GET['error'];
    }
 ?>   
</body>
</html>


