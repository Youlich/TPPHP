<?php

namespace TPPHP\project\model;


require_once("Manager.php");

class ModifManager extends Manager

{
	public function ModifComments($postId,$author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('UPDATE comments SET id=:num LIMIT 1');
        $comments->bindValue(':num',$_GET['ModComm'], PDO::PARAM_INT);
        $executeIsOk = $comments->execute();

		if ($executeIsOk) {
			$message = "Le commentaire a été modifié";

		} else {
			$message = "Echec de la modification du commentaire";
		}
}
}
?>

<!DOCTYPE html>

<html>

    <head>

        <link rel="stylesheet" type="text/css" href="style.css">

        <meta charset="utf-8" />

        <title>Modification</title>

    </head>

            <body>

            <div align="center">

                <h1>Modification de votre commentaire</h1>
                <br /> <br />
                <p> <?=$message ?></p>
             </div>
         </body>
</html>


