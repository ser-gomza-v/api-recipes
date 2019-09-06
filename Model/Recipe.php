<?php
/**
 * Created by PhpStorm.
 * User: Sergey Gomzyakov ser.gomza.v@gmail.com
 * Date: 07.06.17
 * Time: 14:55
 */

class Recipe
{
    static function getsingleRecipe($id)
    {
        $sql = 'SELECT *
				FROM recipes
				WHERE recipe_id = ' . $id . ';';
        $info = DataBase::getRow($sql);

        return $info;
    }

    static function getListRecipes()
    {
        $sql = 'SELECT *
				FROM recipes;';
        $info = DataBase::getArray($sql);

        return $info;
    }

    static function createRecipe($data, $idUser)
    {
        $sql = "INSERT INTO recipes(name,desc,user_id,date_c)
                VALUES(
                  '" . DataBase::escape($data['name']) . "',
                  '" . DataBase::escape($data['desc']) . "',
                  '" . DataBase::escape($idUser) . "',
                  now()
                );";
        $info = DataBase::setValue($sql);

        return $info;
    }

    static function deleteRecipe($idUser, $id)
    {
        $sql = 'DELETE FROM recipes
				WHERE user_id = ' . $idUser . '
				AND recipe_id = ' . $id . ';';
        $info = DataBase::removeValue($sql);

        return $info;
    }

    static function updateRecipe($idUser, $data, $id)
    {
        $sql = "UPDATE recipes SET ";
        foreach ($data as $key => $val) {
            $sql .= $key . " = '" . DataBase::escape($val) . "',";
        }
        $sql = trim($sql, ',') . "WHERE user_id = $idUser AND recipe_id = $id;";
        $info = DataBase::updateValue($sql);

        return $info;
    }

}
