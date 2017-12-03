<?php
// vérification si au moins un champ est rempli
if(!empty($_POST['pseudo'] AND ($_POST['pass'] AND ($_POST['email']))))
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


			if ($pass == $newpass) 

					
					{	
						if (preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $_POST['email'])) // si l'adresse mail est au bon format

						{
						

						$pseudo = htmlspecialchars($_POST['pseudo']);
						$email = htmlspecialchars($_POST['email']);
						$type_membre = htmlspecialchars($_POST['type_membre']);

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
						 
						 }

						 else 
						 	{
							echo 'Adresse mail invalide';
					    	}
					}
					
			else 
					{
						echo 'Les deux mots de passe que vous avez rentrés ne correspondent pas ';
					}
	}

else
{
		echo 'Merci de remplir tous les champs';
	}

?>