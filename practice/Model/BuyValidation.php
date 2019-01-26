<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 26.01.2019
 * Time: 09:56
 */

namespace practice\Model;

class BuyValidation
{
    private $errors_buy = array("", "", "", "", "", "");

    /**
     * @return string
     */
    public function checkBuy()
    {
        $count_empty_errors = 0;
        $this->checkFieldsForEmptinessAndWriteErrors();

        foreach ($this->errors_buy as $value) {
            if ($value != "") {
                $count_empty_errors++;
            }
        }

        return json_encode($this->errors_buy);
    }

    private function checkFieldsForEmptinessAndWriteErrors()
    {
        session_start();
        if (isset($_SESSION['isAuth'])) {
            if (empty($_POST['city'])) {
                $this->errors_buy[4] = 'Please enter city !';
                return;
            }
        } else {
            foreach ($_POST as $value) {
                if ($value == '') {
                    $this->errors_buy[5] = 'Empty fields form';
                } else {
                    $this->errors_buy[5] = '';
                    break;
                }
            }
        }

        if ($this->errors_buy[5] == '') {
            if (empty($_POST['last_name'])) {
                $this->errors_buy[0] = 'Please enter last name !';
            }
            if (empty($_POST['first_name'])) {
                $this->errors_buy[1] = 'Please enter first name !';
            }
            if (empty($_POST['email'])) {
                $this->errors_buy[2] = 'Please enter email !';
            }
            if (empty($_POST['phone'])) {
                $this->errors_buy[3] = 'Please enter phone !';
            }
            if (empty($_POST['city'])) {
                $this->errors_buy[4] = 'Please enter city !';
            }
        }
    }

    private function cleanFields($value_field = "")
    {
        $value_field = trim($value_field);
        $value_field = stripslashes($value_field);
        $value_field = strip_tags($value_field);
        $value_field = htmlspecialchars($value_field);

        return $value_field;
    }
}
