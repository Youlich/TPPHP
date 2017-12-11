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
        $pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT); 
        

        // Vérification du pseudo dans la base de données

                $req = $bdd->prepare('SELECT id FROM membres WHERE pseudo = :pseudo AND pass = :pass');
                $req->execute(array('pseudo' => $pseudo,
                                    'pass' => $pass_hache));
                
                $resultat = $req->fetch();

                                if ($_POST['pseudo']==$pseudo)
                                {
                                    if (password_verify($pass,$pass_hache))                              
                                    {  
                                   
                                             $_SESSION['id'] = $resultat['id'];                        
                                             $_SESSION['pseudo'] = $resultat['pseudo'];
                                             $_SESSION['pass'] = $resultat['pass'];
                                             header('location:site.php');
                                    } else {
                                            echo 'Erreur dans votre mot de passe';
                                            }
                                } else {
                                        echo 'Pseudo non reconnu';
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

        <title>Connexion</title>

    </head>

            <body>

            <div align="center">

                <h1>Connexion</h1>
                <br /> <br />

                        <form action="" method="post">

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