<?php
/**
 * Created by PhpStorm.
 * User: Sergey Gomzyakov ser.gomza.v@gmail.com
 * Date: 07.06.17
 * Time: 15:12
 */

namespace Contoller;

use Recipe;

class Recipes extends Main
{
    public function index($method, $id = 0, $data = [], $request = REQUEST)
    {
        switch ($request) {
            case 'POST':
                echo $this->newRecipes($data);
                break;
            case 'PUT':
                if ($method == 'update') {
                    echo $this->updateRecipes($id, $data);
                } else {
                    $this->errorNoUrl();
                }
                break;
            case 'DELETE':
                if ($method == 'delete') {
                    echo $this->deleteRecipe($id);
                } else {
                    $this->errorNoUrl();
                }
                break;
            case 'GET':
                if ($method == 'all') {
                    echo $this->getRecipes();
                } elseif ($method == 'single') {
                    echo $this->singleRecipe($id);
                } else {
                    $this->errorNoUrl();
                }
                break;
            default:
                $this->errorMethodNotAllowed();
        }

    }

    private function newRecipes($data)
    {
        $data = $data ? $data : $_POST;
        if ($this->id) {
            Recipe::createRecipe($data, $this->id);
            $response['success'] = "Created";
            $response['code'] = 201;
        } else {
            $response['error'] = "Users not authorized";
            $response['code'] = 401;
        }
        http_response_code($response['code']);
        return json_encode($response);

    }

    private function updateRecipes($id, $data)
    {
        if ($this->id) {
            if ($id) {
                $data = $data ? $data : $this->generatePut();
                if ($data) {
                    Recipe::updateRecipe($this->id, $data, $id);
                    $response['success'] = "Updated";
                    $response['code'] = 202;
                } else {
                    $response['error'] = "Fail/ No data";
                    $response['code'] = 406;
                }
            } else {
                $response['error'] = "Not enough data for update";
                $response['code'] = 412;
            }
        } else {
            $response['error'] = "Users not authorized";
            $response['code'] = 401;
        }
        http_response_code($response['code']);
        return json_encode($response);
    }

    private function deleteRecipe($id)
    {
        if ($this->id) {
            if ($id) {
                Recipe::deleteRecipe($this->id, $id);
                $response['success'] = "Deleted";
                $response['code'] = 200;

            } else {
                $response['error'] = "Not enough data for delete";
                $response['code'] = 412;
            }
        } else {
            $response['error'] = "Users not authorized";
            $response['code'] = 401;
        }
        http_response_code($response['code']);
        return json_encode($response);
    }

    private function getRecipes()
    {
        $response = Recipe::getListRecipes();
        return json_encode($response);
    }

    private function singleRecipe($id)
    {
        $response = Recipe::getsingleRecipe($id);
        return json_encode($response);
    }
}