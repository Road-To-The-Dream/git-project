<?php

namespace practice\Model;

class Model
{
    protected function connectionDB()
    {
        ConnectionManager::getInstance();
    }

    /**
     * @param $data_select
     * @param $name_column
     * @return mixed
     */
    protected function addSpaceToPriceProduct($data_select, $name_column)
    {
        for ($i = 0; $i < count($data_select); $i++) {
            switch (strlen($data_select[$i][$name_column])) {
                case 4:
                    $data_select[$i][$name_column] = substr($data_select[$i][$name_column], 0, 1) . " " . substr($data_select[$i][$name_column], 1);
                    break;
                case 5:
                    $data_select[$i][$name_column] = substr($data_select[$i][$name_column], 0, 2) . " " . substr($data_select[$i][$name_column], 2);
                    break;
            }
        }

        return $data_select;
    }
}
