<?php
/**
 * Created by PhpStorm.
 * User: Sergey Gomzyakov ser.gomza.v@gmail.com
 * Date: 07.06.17
 * Time: 16:14
 */

namespace Contoller;

use User;

class Users extends Main
{
    public function index($method, $id = 0, $data = [], $request = REQUEST)
    {

        switch ($request) {
            case 'POST':
                if ($method == 'create') {
                    echo $this->reg($data);
                } elseif ($method == 'login') {
                    echo $this->login($data);
                } else {
                     $this->errorNoUrl();
                }
                break;
            case 'GET':
                if ($method == 'logout') {
                    echo $this->logoutUser($id);
                } else {
                    $this->errorNoUrl();
                }
                break;
            default:
                $this->errorMethodNotAllowed();
        }
    }

    private function logoutUser($id)
    {
        if (User::logout($id)) {
            $res["success"] = 1;
        } else {
            $res["errors"] = "Error logout";
        }
        return json_encode($res);
    }

    private function login($data)
    {
        $data = $data ? $data : $_POST;
        if (isset($data['login']) && isset($data["pass"])) {
            $auth = User::signIn($data["login"], $data["pass"]);
            if ($auth) {
                $res["success"] = 1;
            } else {
                $res["text"] = "Login or password entered incorrectly";
                $res["errors"] = 0;
            }
        } else {
            $res["text"] = "Enter login and password";
            $res["errors"] = 0;
        }
        return json_encode($res, JSON_UNESCAPED_UNICODE);

    }

    private function reg($data)
    {
        $data = $data ? $data : $_POST;
        if (isset($data['name']) && isset($data['login']) && isset($data['pass']) && isset($data['pass_2'])) {
            if ($data['pass'] === $data['pass_2']) {
                $password = md5($data['pass']);
                $obj = User::signUp($data['name'], $data["login"], $password);
                if ($obj == false) {
                    $res["text"] = 'This user already exists';
                    $res["type"] = 0;
                } else {
                    $res["text"] = 'Users successfully registered';
                    $res["success"] = 1;
                }

            } else {
                $res["text"] = "Passwords do not match";
                $res["errors"] = 0;
            }
        } else {
            $res["text"] = "Data is missing";
            $res["errors"] = 0;
        }
        return json_encode($res, JSON_UNESCAPED_UNICODE);

    }
}
