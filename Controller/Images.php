<?php
/**
 * Created by PhpStorm.
 * User: Sergey Gomzyakov ser.gomza.v@gmail.com
 * Date: 07.06.17
 * Time: 14:42
 */

namespace Contoller;

use Image;

class Images extends Main
{

    public function index($method, $id)
    {
        switch ($method) {
            case 'form':
                $this->form($id);
                break;
            case 'create':
                $this->addImage($id);
                break;
            default:
                $this->errorMethodNotAllowed();
        }

    }

    private function form()
    {
        echo '<form method="post" enctype="multipart/form-data" action="../create/1' . $_SESSION["id"] . '">
                <input type="file" id="file" name="file[]" multiple><br>
                <button>Submit</button>
               </form>';
    }

    /**
     * @param $id
     */
    private function addImage($id)
    {
        $types = array("image / png", "image / jpeg");
        $errors = [1, 2, 3, 4];
        if (!in_array($_FILES["file"]["errors"], $errors)) {
            if (!in_array($_FILES["file"]["type"], $types)) {
                $imagesArr = [];
                foreach ($_FILES["file"]["name"] as $key => $name) {
                    move_uploaded_file(
                        $_FILES["file"]["tmp_name"][$key],
                        IMAGES . $_FILES["file"]["name"][$key]
                    );
                    $imagesArr[] = $_FILES["file"]["name"][$key];
                }
                Image::createImage($imagesArr, $id);
                $response['success'] = "Files added";
                $response['code'] = 201;
            } else {
                $response['error'] = "Format file doesn't access";
                $response['code'] = 400;
            }
        } else {
            $response['error'] = "Error image upload";
            $response['code'] = 400;
        }
        echo json_encode($response);
        http_response_code($response['code']);
    }
}