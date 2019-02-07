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
    private $message_about_send = array("", "");
    private $email;
    private $text;

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text): void
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function checkSend()
    {
        if (trim($this->getEmail()) == "") {
            $this->message_about_send[0] = "Field email empty";
        }

        if (trim($this->getText()) == "") {
            $this->message_about_send[1] = "Field message empty";
        }

        $this->checkErrorsAndSendMail();

        return json_encode($this->message_about_send);
    }

    /**
     * @return bool
     */
    private function checkErrorsAndSendMail()
    {
        if ($this->message_about_send[0] == "" && $this->message_about_send[1] == "") {
            $email = $this->cleanFields($this->getEmail());
            $text = $this->cleanFields($this->getText());

            SendMessage::send($email, $text);

            return true;
        } else {
            return false;
        }
    }

    /**
     * @param string $value_field
     * @return string
     */
    private function cleanFields($value_field = "")
    {
        $value_field = trim($value_field);
        $value_field = stripslashes($value_field);
        $value_field = strip_tags($value_field);
        $value_field = htmlspecialchars($value_field);

        return $value_field;
    }
}
