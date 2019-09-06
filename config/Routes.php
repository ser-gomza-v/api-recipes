<?php
/**
 * Created by PhpStorm.
 * User: Sergey Gomzyakov ser.gomza.v@gmail.com
 * Date: 07.06.17
 * Time: 17:22
 */

class Routes
{
    private $route;

    public function __construct()
    {
        $this->route = include "config/routs.php";
    }

    private static function pageNotFound()
    {
        include_once VIEW . "errors/404.html";
    }

    public function start($url)
    {
        foreach ($this->route as $class => $list) {
            foreach ($list as $pattern) {
                if (preg_match($pattern, $url, $info)) {
                    $method = isset($info[1]) && $info[1] !== "" ? htmlspecialchars($info[1]) : "index";
                    $id = isset($info[2]) ? (int)$info[2] : 0;
                    break 2;
                }
            }
        }

        $path = 'Controller/' . str_replace("-", "/", $class) . ".php";

        if ($class != "errors" && file_exists($path)) {
            include_once $path;

            if (isset($method)) {
                if (isset($id)) {
                    $new = new $class();
                    $new->index($method, $id);
                } else {
                    $new = new $class();
                    $new->index($method);

                }
            } else {
                $this::pageNotFound();
            }
        } else {
            self::pageNotFound();
        }

    }
}

?>