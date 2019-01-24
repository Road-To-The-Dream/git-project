<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 16.01.2019
 * Time: 17:39
 */

namespace practice\Model;

use practice\Model\ActiveRecord\Comment;

class ValidateComment
{
    /**
     * @param $text
     * @return string
     */
    public function validateTextComment($text)
    {
        $message_about_adding_comment = array("", "");

        session_start();

        if (!isset($_SESSION['user_id'])) {
            $message_about_adding_comment[0] = 'Для добавления комментария требуется войти в аккаунт!';
            $message_about_adding_comment[1] = 'error';
            session_destroy();
        } else {
            if (strlen($text) > 3) {
                $message_about_adding_comment[0] = 'Комментарий успешно добавлен!';
                $message_about_adding_comment[1] = 'success';

                $this->addingComment();
            } else {
                $message_about_adding_comment[0] = 'Комментарий должен иметь длину не менее 3 символов!';
                $message_about_adding_comment[1] = 'error';
            }
        }

        return json_encode($message_about_adding_comment);
    }

    private function addingComment()
    {
        $comment = new Comment();
        $comment->setContent($_POST['TextComment']);
        $comment->setDateAdded('\''.date("Y-m-d H:i:s").'\'');
        $comment->setCreateAt('\''.date("Y-m-d H:i:s").'\'');
        $comment->setClientId($_SESSION['user_id']);
        $comment->setProductId($_POST['IDProduct']);

        $comment->insert();
    }
}
