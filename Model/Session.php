<?php
/**
 * Created by PhpStorm.
 * User: Sergey Gomzyakov ser.gomza.v@gmail.com
 * Date: 07.06.17
 * Time: 14:44
 */

class Session
{
    private $session;
    private $token;
    private $user_id;
    private $id;

    function __construct($idUser)
    {
        $sql = 'SELECT user_id,session, token, session_id
				FROM sessions
				WHERE user_id = ' . $idUser . ';';
        $info = DataBase::getRow($sql);
        if ($info) {
            $this->user_id = $idUser;
            $this->token = $info['token'];
            $this->id = $info['session_id'];
            $this->session = $info['session'];

        }
    }

    // open new session
    function open($idUser)
    {
        $cookie = $_COOKIE["PHPSESSID"];
        $token = DataBase::getHash(32);

        $sql =
            "INSERT INTO sessions(token,user_id,session) VALUES ('" . $token . "'," .
            $idUser . ", '" . $cookie . "');";
        $_SESSION["token"] = $token;
        $_SESSION["id"] = $idUser;
        $info = DataBase::setValue($sql);

        return $info;
    }

    // close session
    function close($idUser)
    {
        $sql = "DELETE FROM sessions WHERE user_id = " . $idUser . ";";

        $delete = DataBase::removeValue($sql);
        if ($delete === true) {
            return true;
        } else {
            return false;
        }
    }

    // check the time and everything from session
    function check($idUser)
    {
        $cookie = $_COOKIE["PHPSESSID"];
        $token = $_SESSION["token"];
        $sql = "SELECT * FROM sessions  WHERE user_id = " . $idUser . ";";
        $info = DataBase::getRow($sql);
        if ($info["token"] == $token && $info["session"] == $cookie) {
            return true;
        } else {
            return false;
        }

    }
}
