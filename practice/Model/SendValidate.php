<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 27.01.2019
 * Time: 09:54
 */

namespace practice\Model;

use practice\Controller\SendMessage;

class SendValidate
{
    public function checkSend($email, $text)
    {
        $message_about_send = array("", "");

        if ($email == "") {
            $message_about_send[0] = "Field email empty";
        }

        if ($text == "") {
            $message_about_send[1] = "Field message empty";
        }

        SendMessage::send($email, $text);

        return json_encode($message_about_send);
    }
}
