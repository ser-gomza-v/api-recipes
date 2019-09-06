<?php
/**
 * Created by PhpStorm.
 * User: Sergey Gomzyakov ser.gomza.v@gmail.com
 * Date: 08.06.17
 * Time: 12:34
 */

use Contoller\Users;

class TestUsers extends PHPUnit_Framework_TestCase
{
    protected $validUser = [
        "user" => [
            'name'   => 'name',
            'login'  => 'login',
            'pass'   => 'pass',
            'pass_2' => 'pass',
        ]
    ];

    protected $id = 1;

    public function testUserCreate()
    {
        foreach ($this->validUser as $type => $properties) {
            $users = new Users();

            $getResult = $users->index('create', 0, $properties, 'POST');
            $standartResult = [
                "text"    => 'Users successfully registered',
                "success" => 1,
            ];

            $this->assertJsonStringEqualsJsonString(json_encode($standartResult), (string) $getResult, 'Users successfully registered');
        }
    }

    public function testUserLogin()
    {
        foreach ($this->validUser as $type => $properties) {
            $users = new Users();

            $getResult = $users->index('login', 0, $properties, 'POST');
            $standartResult = [
                "success" => 1,
            ];

            $this->assertJsonStringEqualsJsonString(json_encode($standartResult), (string) $getResult, 'Users successfully login');
        }
    }


    public function testUserLogout()
    {
        foreach ($this->validUser as $type => $properties) {
            $users = new Users();

            $getResult = $users->index('logout', $this->id, $properties, 'GET');
            $standartResult = [
                "success" => 1,
            ];

            $this->assertJsonStringEqualsJsonString(json_encode($standartResult), (string) $getResult, 'Users successfully logout');
        }
    }

}
