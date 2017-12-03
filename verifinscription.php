<?php
// vérification si au moins un champ est rempli
if(!empty($_POST['pseudo']))
	{

		// Connexion à la base de données espace_membres

		try

		{

		    $bdd = new PDO('mysql:host=localhost;dbname=espace_membres;charset=utf8', 'root', '');

		}

		catch(Exception $e)

		{

		        die('Erreur : '.$e->getMessage());

		}

		// Vérification de la validité des informations

		$pass = htmlspecialchars($_POST['pass']);

		$newpass = htmlspecialchars($_POST['newpass']);

		if($pass == $newpass)

			{
				$pseudo = htmlspecialchars($_POST['pseudo']);
				$email = htmlspecialchars($_POST['email']);
				$group = htmlspecialchars($_POST['group']);

				// on crypte le mot de passe
				$pass = sha1($pass);

				// Insertion

				$req = $bdd->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription, group) VALUES (:pseudo, :pass, :email, CURDATE(), :group)');
				$req->execute(array(
					'pseudo' => $pseudo,
					 'pass' => $pass,
					 'email' => $email,
					 'group' => $group
					  ));


				echo 'Félicitations ! Vous êtes inscrit ! <a href="connexion.php">Veuillez vous connecter ici !</a>';
			}

		else
				{
					echo 'Les deux mots de passe que vous avez rentrés ne correspondent pas…';
				}
			
	}

else 
{
		echo 'Veuillez remplir au moins un champ';
	}

?>