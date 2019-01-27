<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 20.01.2019
 * Time: 08:52
 */

namespace practice\Controller;

use practice\Model\ActiveRecord\Comment;

use practice\Model\CommentValidation;

class ControllerComments
{
    public function addingComments()
    {
        $objCommentValidation = new CommentValidation();
        echo $objCommentValidation->validateTextComment($_POST['TextComment']);
    }

    public function removeComments()
    {
        $comment = new Comment();
        $comment->delete($_POST['id_comment']);
    }
}
