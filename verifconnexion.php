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
	if(!empty($_POST['pseudo'] AND ($_POST['pass'])))
	{
		// Vérification de la validité des informations

		$pass = htmlspecialchars($_POST['pass']);
		$pseudo = htmlspecialchars($_POST['pseudo']);
		$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT); // Hachage du mot de passe
		
		
		// Vérification des identifiants dans la base de données

		$req = $bdd->prepare('SELECT * FROM membres WHERE pseudo = :pseudo AND pass = :pass');
		$req->execute(array(

				'pseudo' => $pseudo,

				'pass' => $pass_hache));

				$resultat = $req->fetch();


				if ($resultat)

					{
						
						$_SESSION['pseudo'] = $resultat['pseudo'];
						$_SESSION['pass'] = $resultat['pass'];
						
						echo 'Vous êtes connecté !';
					
					} else {
						header('location:connexion.php?error=Mauvais identifiants, merci de vous inscrire');
							}
	} else {
		header('location:connexion.php?error=Merci de remplir tous les champs');
			}
	
}
?>
