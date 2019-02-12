<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 16.01.2019
 * Time: 12:28
 */

namespace practice\Model\ActiveRecord;

use practice\Model\Model;
use practice\Model\ConnectionManager;

class Comment extends Model
{
    private $id;
    private $content;
    private $date_added;
    private $client_id;
    private $product_id;

    public function __construct()
    {
        $this->connectionDB();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getDateAdded()
    {
        return $this->date_added;
    }

    /**
     * @param mixed $date_added
     */
    public function setDateAdded($date_added): void
    {
        $this->date_added = $date_added;
    }

    /**
     * @return mixed
     */
    public function getClientId()
    {
        return $this->client_id;
    }

    /**
     * @param mixed $client_id
     */
    public function setClientId($client_id): void
    {
        $this->client_id = $client_id;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * @param mixed $product_id
     */
    public function setProductId($product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @return array
     */
    public function selectAllByProduct()
    {
        $sql = "SELECT com.id, com.content, com.date_added, com.client_id 
                FROM comments com
                  JOIN product pr ON pr.id = com.product_id 
                WHERE pr.id = " . $this->product_id . " ORDER BY com.id DESC";

        $info_comments = ConnectionManager::executionQuery($sql);

        $commentsList = array();

        for ($i = 0; $i < count($info_comments); $i++) {
            $objComments = new Comment();
            $objComments->setId($info_comments[$i]['id']);
            $objComments->setContent($info_comments[$i]['content']);
            $objComments->setDateAdded($info_comments[$i]['date_added']);
            $objComments->setClientId($info_comments[$i]['client_id']);
            $commentsList[$i] = $objComments;
        }

        return $commentsList;
    }

    public static function selectAllForAdmin()
    {
        ConnectionManager::getInstance();
        $sql = "SELECT id, content FROM comments";

        $info_comments = ConnectionManager::executionQuery($sql);

        $commentList = array();

        for ($i = 0; $i < count($info_comments); $i++) {
            $objComment = new Comment();
            $objComment->setId($info_comments[$i]['id']);
            $objComment->setContent($info_comments[$i]['content']);
            $commentList[$i] = $objComment;
        }

        return $commentList;
    }

    public function insert()
    {
        $sql = "INSERT INTO comments (content, date_added, create_at, client_id, product_id) 
                VALUES (:content, {$this->getDateAdded()}, {$this->getCreateAt()}, {$this->getClientId()}, {$this->getProductId()})";
        $parameters = array(
            ':content' => $this->content
        );
        ConnectionManager::executionQuery($sql, $parameters);
    }

    public function update()
    {
        $sql = "UPDATE comments SET content = :content WHERE id = {$this->getId()}";
        $parameters = array(
            ':content' => $this->getContent()
        );
        return ConnectionManager::executionQuery($sql, $parameters);
    }

    /**
     * @return null
     */
    public function delete()
    {
        $sql = "DELETE FROM comments WHERE id = " . $this->getId();
        return ConnectionManager::executionQuery($sql);
    }
}
