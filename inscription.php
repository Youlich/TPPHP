
<?php
// Connexion à la base de données espace_membres

try

{

$bdd = new PDO('mysql:host=localhost;dbname=espace_membres;charset=utf8', 'root', '');

}

catch(Exception $e)

{

die('Erreur : '.$e->getMessage());

}

// toutes les vérifications

if(isset($_POST['submit']))
{
            // vérification que tous les champs sont remplis
        if(!empty($_POST['pseudo'] AND !empty($_POST['pass'] AND !empty($_POST['email']))))
        {
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $pass = htmlspecialchars($_POST['pass']);
            $newpass = htmlspecialchars($_POST['newpass']);
            $email = htmlspecialchars($_POST['email']);
            $type_membre = htmlspecialchars($_POST['type_membre']);
            
            if(strlen($pseudo)<255) 
            {
                if(strlen($pseudo)>3)
                {
                    if ($pass == $newpass) 
                        {   
                            if (strlen($pass) > 6)
                            {
                                if (strlen($pass)< 255)
                                {
                                    
                                // Hachage du mot de passe

                                $pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);

                                // Insertion

                                $req = $bdd->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription, type_membre) VALUES (:pseudo, :pass, :email, CURDATE(), :type_membre)');
                                $req->execute(array(
                                    'pseudo' => $pseudo,
                                    'pass' => $pass_hache,
                                    'email' => $email,
                                    'type_membre' => $type_membre));

                                
                                echo 'Félicitations ! Vous êtes inscrit ! <a href="connexion.php">Veuillez vous connecter ici !</a>';

                                } else {
                                    echo 'Votre mot de passe doit être inférieur à 255caractères';
                                        }
                            } else {
                                echo 'Votre mot de passe doit être supérieur à 6 caractères';
                                    }

                    } else {
                            echo 'Vos mots de passe sont différents';
                                }
                } else {
                    echo 'Votre pseudo doit faire plus de 3 caractères';
                        }
            } else {
                echo 'Votre pseudo doit faire moins de 255 caractères';
                    }
        } else {
            echo 'Merci de remplir tous les champs';
                }
}
?>
<!DOCTYPE html>

<html>

        <head>

            <link rel="stylesheet" type="text/css" href="style.css">

            <meta charset="utf-8" />

            <title>Inscription en tant que membre</title>

        </head>

            <body>

                <div align="center">

                    <h1>Inscription</h1>
                    <br /> <br />

                    <form action="" method="post">

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

            </body>
</html>