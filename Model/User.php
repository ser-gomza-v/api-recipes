<?php
/**
 * Created by PhpStorm.
 * User: Sergey Gomzyakov ser.gomza.v@gmail.com
 * Date: 07.06.17
 * Time: 14:42
 */

class User
{
    //authorisation
    static function signIn($login, $pass)
    {

        $sql = "SELECT user_id AS id
				FROM users
				WHERE login = '" . DataBase::escape($login) . "'
				AND pass = '" . md5($pass) . "';";
        $id = DataBase::getValue($sql);
        if ($id) {
            setcookie("id", $id, time() + 5000, "/");
            $session = new Session($id);
            $session->close($id);
            $session->open($id);

            return $id ? new self($id) : false;
        } else {
            return false;
        }

    }

    // create new user
    static function signUp($name, $login, $password)
    {
        $check = DataBase::getRow("SELECT login FROM users WHERE login = '" . $login . "';");

        $sql = "INSERT INTO users(name, login, pass) VALUES
                ('" . DataBase::escape($name) . "',
                 '" . DataBase::escape($login) . "',
                 '" . DataBase::escape($password) . "');
               ";
        if (!$check) {
            $id = DataBase::setValue($sql);
            return true;
        } else {
            return false;
        }
    }

    //logout user
    static function logout($id)
    {
        $session = new Session($id);
        if ($session->close($id)) {
            unset($id);

            return true;
        } else {
            return false;
        }
    }

    // get one user
    static function getUser($id)
    {
        $sql = "SELECT user_id, users.name, login FROM users
                 WHERE user_id = " . $id . ";";
        $user = DataBase::getRow($sql);

        return $user;
    }

    // update user
    static function updateUser($info)
    {
        $sql = "UPDATE users SET
                name = '" . DataBase::escape($info['name']) . "'
                WHERE user_id = " . DataBase::escape($info['user_id']) . ";";

        $user = DataBase::updateValue($sql);

        return $user;
    }

    // remove user
    static function remove($id)
    {
        $sql = "DELETE FROM users WHERE user_id = " . $id . ";";
        $delete = DataBase::removeValue($sql);
        if ($delete === true) {
            $session = new Session($id);
            $session->close($id);

            return true;
        } else {
            return false;
        }
    }

    // get user list
    static function getList()
    {
        $sql = "SELECT user_id, users.name, login FROM users ;";
        $listUser = DataBase::getArray($sql);

        return $listUser;
    }

}
