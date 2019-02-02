<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 26.01.2019
 * Time: 09:56
 */

namespace practice\Model;

use practice\Model\ActiveRecord\Orders;

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

        if ($count_empty_errors == 0 && isset($_SESSION['isAuth'])) {
            $this->updateOrderInDataBaseStatusDone();
        }

        return json_encode($this->errors_buy);
    }

    private function updateOrderInDataBaseStatusDone()
    {
        $order = new Orders();
        $order->setProductId($_POST['IDProduct']);
        $order->setClientId($_SESSION['user_id']);
        $_SESSION['count_product_in_cart'] -= 1;
        $order->updateStatusOrder();
    }

    private function checkFieldsForEmptinessAndWriteErrors()
    {
        if (empty($_POST['last_name'])) {
            $this->errors_buy[0] = 'Please enter last name !';
        }
        if (empty($_POST['first_name'])) {
            $this->errors_buy[1] = 'Please enter first name !';
        }
        if (empty($_POST['email'])) {
            $this->errors_buy[2] = 'Please enter email !';
        }
        if (empty($_POST['phone']) || $_POST['phone'] == '+380 ' || strlen($_POST['phone']) < 19) {
            $this->errors_buy[3] = 'Please enter phone !';
        }
        if (empty($_POST['city'])) {
            $this->errors_buy[4] = 'Please enter city !';
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
