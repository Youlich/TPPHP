<?php
// Connexion à la base de données espace_membres
session_start();
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

    if(!empty($_POST['pseudo'] AND !empty($_POST['pass'])))
    {
        $pass = htmlspecialchars($_POST['pass']);
        $pseudo = htmlspecialchars($_POST['pseudo']);

        // On vérifie si le pseudo existe en base de données
        $req = $bdd->prepare('SELECT * FROM membres WHERE pseudo = :pseudo');
        $req->execute(array('pseudo' => $pseudo));

        $resultat = $req->fetch();


        if ($resultat) { // Le pseudo existe

            // Dans la requete précédente qui consistait à savoir si le pseudo existe on a récupéré le pass haché
            $pass_hache_dans_bdd = $resultat['pass'];

            // Super on a le mot de passe haché de la personne dont le pseudo est $pseudo

            // Maintenant on peut vérifier si le pass saisi correspond au pass de la base de donnée
            // Si ca correspond, on peut faire se connecter la personne
            // On le fait avec la fonction password_verify()

            if (password_verify($pass, $pass_hache_dans_bdd)) {

                $_SESSION['id'] = $resultat['id'];
                $_SESSION['pseudo'] = $resultat['pseudo'];
                $_SESSION['pass'] = $resultat['pass'];
                header('location:site.php');

            } else {

                $error_message = 'Erreur dans le mot de passe';
            }

        } else { // Le pseudo n'existe pas en base de données

            $error_message = 'Pseudo non reconnu';
        }
                        
                                             
                
                                 
    } else {
            $error_message = 'Merci de remplir tous les champs';
    }
}
?>
<!DOCTYPE html>

<html>

    <head>

        <link rel="stylesheet" type="text/css" href="style.css">

        <meta charset="utf-8" />

        <title>Connexion</title>

    </head>

            <body>

            <div align="center">

                <h1>Connexion</h1>
                <br /> <br />

                        <form action="" method="post">

                            <?php

                            // Si la variable $error_message est setté
                            if (isset($error_message)) {

                                echo "<h2>" . $error_message . "</h2>";
                            }

                            ?>

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
            </div>

              </br> </br>
            <a href="inscription.php">Créer votre compte ici</a>

           </body>
</html>