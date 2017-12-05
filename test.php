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
									header('location:inscription.php?error=Votre mot de passe doit être inférieur à 255caractères');
										}
							} else {
								header('location:inscription.php?error=Votre mot de passe doit être supérieur à 6 caractères');
									}

					} else {
							header('location:inscription.php?error=Vos mots de passe sont différents');
								}
				} else {
					header('location:inscription.php?error=Votre pseudo doit faire plus de 3 caractères');
						}
			} else {
				header('location:inscription.php?error=Votre pseudo doit faire moins de 255 caractères');
					}
		} else {
			header('location:inscription.php?error=Merci de remplir tous les champs');
				}
}
?>