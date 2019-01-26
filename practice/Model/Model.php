<?php

namespace practice\Model;

class Model
{
    protected $create_at;
    protected $update_at;

    /**
     * @return mixed
     */
    public function getCreateAt()
    {
        return $this->create_at;
    }

    /**
     * @param mixed $create_at
     */
    public function setCreateAt($create_at): void
    {
        $this->create_at = $create_at;
    }

    /**
     * @return mixed
     */
    public function getUpdateAt()
    {
        return $this->update_at;
    }

    /**
     * @param mixed $update_at
     */
    public function setUpdateAt($update_at): void
    {
        $this->update_at = $update_at;
    }

    protected function connectionDB()
    {
        ConnectionManager::getInstance();
    }

    /**
     * @param $data_select
     * @param $name_column
     * @return mixed
     */
    public function addSpaceToPriceProduct($data_select, $name_column)
    {
        for ($i = 0; $i < count($data_select); $i++) {
            switch (strlen($data_select[$i][$name_column])) {
                case 4:
                    $data_select[$i][$name_column] = substr($data_select[$i][$name_column], 0, 1) . " " . substr($data_select[$i][$name_column], 1);
                    break;
                case 5:
                    $data_select[$i][$name_column] = substr($data_select[$i][$name_column], 0, 2) . " " . substr($data_select[$i][$name_column], 2);
                    break;
                case 6:
                    $data_select[$i][$name_column] = substr($data_select[$i][$name_column], 0, 3) . " " . substr($data_select[$i][$name_column], 3);
                    break;
            }
        }

        return $data_select;
    }
}
