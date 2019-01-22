<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 20.01.2019
 * Time: 08:52
 */

namespace practice\Controller;

use practice\Model\ActiveRecord\Comment;

class ControllerComments extends Controller
{
    public function addingComments()
    {
        $validate_comment = new \practice\Model\ValidateComment();
        echo $validate_comment->validateTextComment($_POST['TextComment']);
    }

    public function removeComments()
    {
        $comment = new Comment();
        $comment->delete($_POST['id_comment']);
    }
}
