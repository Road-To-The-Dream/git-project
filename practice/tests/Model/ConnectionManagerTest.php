<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 04.02.2019
 * Time: 21:51
 */

namespace practice\Model;

use PHPUnit\Framework\TestCase;

class ConnectionManagerTest extends TestCase
{
    public function testGetInstance()
    {
        $this->assertIsObject(ConnectionManager::getInstance());
    }

    public function testSelect()
    {
        $query_select = "SELECT id, last_name, first_name, patronymic, email, phone, password, role FROM client";
        $this->assertIsArray(ConnectionManager::executionQuery($query_select));
    }

    public function testInsert()
    {
        $query_insert = "INSERT INTO comments (content, date_added, create_at, client_id, product_id)
                  VALUES ('Second Comment','2019-02-04 22:58:33','2019-02-04 22:58:33', 2, 1)";
        $this->assertTrue(ConnectionManager::executionQuery($query_insert));
    }

    public function testDelete()
    {
        $query_delete = "DELETE FROM comments WHERE id = 24";
        $this->assertTrue(ConnectionManager::executionQuery($query_delete));
    }

    public function testUpdate()
    {
        $query_update = "UPDATE client SET
                                    last_name = 'Богданов',
                                    first_name = 'Дмитрий',
                                    patronymic = 'Олегович',
                                    email = 'qwe@gmail.com',
                                    phone = '+380 (43) 53-54-352',
                                    password = 'dqwdq',
                                    role = 'user',
                                    update_at = '2019-02-04 23:09:12' WHERE id = 2";
        $this->assertTrue(ConnectionManager::executionQuery($query_update));
    }
}
