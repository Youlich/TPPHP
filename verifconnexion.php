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

// Hachage du mot de passe

$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);


// Vérification des identifiants

$req = $bdd->prepare('SELECT id FROM membres WHERE pseudo = :pseudo AND pass = :pass');

$req->execute(array(

    'pseudo' => $pseudo,

    'pass' => $pass_hache));


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
