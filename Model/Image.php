<?php
/**
 * Created by PhpStorm.
 * User: Sergey Gomzyakov ser.gomza.v@gmail.com
 * Date: 07.06.17
 * Time: 14:42
 */

class Image
{

    static function createImage($data, $id)
    {
        $sql = "INSERT INTO images(src,recipe_id)
                VALUES";
        foreach ($data as $key => $value) {
            $sql .= "(
                  '" . DataBase::escape($data[$key]) . "',
                  " . DataBase::escape($id) . "
                ),";
        }
        $sql = trim($sql, ',') . ';';
        $info = DataBase::setValue($sql);

        return $info;
    }

}
