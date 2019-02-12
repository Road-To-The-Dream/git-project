<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 12.02.2019
 * Time: 08:49
 */

namespace practice\Controller\Services;

use practice\Model\ActiveRecord\Comment;
use practice\Model\Redirect;

class AdminComment
{
    public static function getProduct()
    {
        Redirect::redirect('admin/comment');
    }

    public static function saveComment()
    {
        $comment = new Comment();
        if (isset($_POST['checkbox'])) {
            $comment->setId($_POST['id']);
            $comment->delete();
        } else {
            self::setValueComment($comment);
            $comment->update();
        }
        self::getProduct();
    }

    private static function setValueComment(object $comment)
    {
        $comment->setId($_POST['id']);
        $comment->setContent($_POST['content']);
        $comment->setCreateAt('\'' . date("Y-m-d H:i:s") . '\'');
        $comment->setUpdateAt('\'' . date("Y-m-d H:i:s") . '\'');

        return true;
    }
}
