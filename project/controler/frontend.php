<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/ModifManager.php');


function listPosts()
{
    $postManager = new \TPPHP\project\model\PostManager();
    $posts = $postManager->getPosts();

    require('view/frontend/listPostsView.php');
}

function post()
{
    $postManager = new \TPPHP\project\model\PostManager();
    $commentManager = new \TPPHP\project\model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function comment()
{
    $commentManager = new \TPPHP\project\model\CommentManager();

    $comment = $commentManager->getComment($_GET['ModComm']);

    require('view/frontend/commentView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new \TPPHP\project\model\CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}
function ModComments($postId,$author, $comment)
    {
        $ModifManager = new \TPPHP\project\model\ModifManager();

        $modifLines = $ModifManager->ModifComments($postId, $author, $comment);

        if ($modifLines === false) {
        throw new Exception('Impossible de modifier le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
    }
