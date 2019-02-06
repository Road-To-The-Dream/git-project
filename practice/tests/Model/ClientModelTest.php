<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 06.02.2019
 * Time: 20:17
 */

namespace practice\Controller;

use PHPUnit\Framework\TestCase;
use practice\Model\ActiveRecord\Client;

class ClientModelTest extends TestCase
{
    private $obj;

    protected function setUp()
    {
        $this->obj = new Client();

        $this->obj->setLastName('Сушко');
        $this->obj->setFirstName('Сергей');
        $this->obj->setPatronymic('Сергеевич');
        $this->obj->setEmail('wwwf23@gmail.com');
        $this->obj->setPhone('+380 (96) 69-98-368');
        $this->obj->setPassword('$2y$10$fCO2XafidboREdj96T1iUOYxn56iAAhUpmhYrLsJzDhnoBms0u7MO');
        $this->obj->setRole('\''.'user'.'\'');
        $this->obj->setCreateAt('\'' . date("Y-m-d H:i:s") . '\'');
        $this->obj->setUpdateAt('\'' . date("Y-m-d H:i:s") . '\'');
    }

    public function testSelectClient()
    {
        $email = 'fhlbc2012@gmail.com';
        $this->obj->setEmail('\'' . $email . '\'');

        $result = $this->obj->selectAllClient();

        $this->assertEquals($result[0]->getId(), 1);
        $this->assertEquals($result[0]->getLastName(), 'Сушко');
        $this->assertEquals($result[0]->getFirstName(), 'Сергей');
        $this->assertEquals($result[0]->getPatronymic(), 'Сергеевич');
        $this->assertEquals($result[0]->getEmail(), 'fhlbc2012@gmail.com');
        $this->assertEquals($result[0]->getPhone(), '+380 (96) 69-98-368');
        $this->assertEquals($result[0]->getPassword(), '$2y$10$fCO2XafidboREdj96T1iUOYxn56iAAhUpmhYrLsJzDhnoBms0u7MO');
        $this->assertEquals($result[0]->getRole(), 'admin');
    }

    public function testInsertClient()
    {
        $this->assertTrue($this->obj->insert());
    }

    public function testUpdateClient()
    {
        $this->obj->setId(14);
        $this->assertTrue($this->obj->updateClientForAdmin());
    }

    public function testDeleteClient()
    {
        $this->obj->setId(8);
        $this->assertTrue($this->obj->delete());
    }
}
