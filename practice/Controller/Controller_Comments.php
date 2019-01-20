<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 20.01.2019
 * Time: 08:52
 */

namespace practice\Controller;


class Controller_Comments extends Controller
{
    public function AddingComments()
    {
        $validate_comment = new \practice\Model\ValidateComment();
        echo $validate_comment->ValidateTextComment($_POST['TextComment']);
    }

    public function RemoveComments()
    {
        $comment = new \practice\Model\Comment();
        $comment->delete($_POST['id_comment']);
    }
}