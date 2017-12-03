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

// Vérification de la validité des informations

		$pass = htmlspecialchars($_POST['pass']);
		$pseudo = htmlspecialchars($_POST['pseudo']);

// Hachage du mot de passe

// on crypte le mot de passe
		$pass = sha1($pass);

// Vérification des identifiants

$req = $bdd->prepare('SELECT id FROM membres WHERE pseudo = :pseudo AND pass = :pass');

$req->execute(array(

    'pseudo' => $pseudo,

    'pass' => $pass));


$resultat = $req->fetch();


if (!$resultat)

{

    echo 'Mauvais identifiant ou mot de passe !';

}

else

{

    session_start();

    $_SESSION['pseudo'] = $pseudo;

    echo 'Vous êtes connecté !';

}
