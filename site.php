<?php
session_start();
if(isset($_SESSION['id']))
{
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

                <h1>Bienvenue sur le site</h1>
                <br /> <br />
            </div>
        	</body>
</html>
<?php
} 
else { header('location:connexion.php');
	}
?>
