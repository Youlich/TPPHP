<!DOCTYPE html>

<html>

    <head>

        <link rel="stylesheet" type="text/css" href="inscription.css">

        <meta charset="utf-8" />

        <title>Inscription en tant que membre</title>

    </head>

       <body>

    <h1>Inscription</h1>

    <form action="verifinscription.php" method="post">

        

        <label for="pseudo">Pseudo</label> <input type="text" name="pseudo" id="pseudo" /><br /><br />

        <label for="pass">Mot de passe</label> <input type="password" name="pass" id="pass" /><br /><br />

        <label for="pass">Retapez votre mot de passe</label> <input type="password" name="newpass" id="newpass" /><br /><br />

        <label for="email">Adresse e-mail</label> <input type="text" name="email" id="email" /> <br /><br />

        <label for="type_membre">Vous souhaitez devenir </label> <SELECT name="type_membre" id="type_membre">
                <OPTION>membre
                <OPTION>administrateur
                <OPTION>contributeur
            
            </SELECT><br /><br />
       

        <input type="submit" name="submit" value="S'inscrire" /><br />

        </div>
    </form>
    
</body>
</html>


