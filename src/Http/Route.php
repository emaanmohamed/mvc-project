<?php

namespace SecTheater\Http;

class Route
{
    protected static array $routes = [];
    protected Request $request;
    protected Response $response;

    public function __construct(Request $request,Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public static function get($route, $action)
    {
        self::$routes['get'][$route] = $action;
    }

    public static function post($route, $action)
    {
        self::$routes['post'][$route] = $action;
    }
//Route:get('/home', [homeController, 'index']);
    public function resolve()
    {
        var_dump('ad');
        $path = $this->request->path();
        $method = $this->request->method();
        $action = self::$routes[$method][$path] ?? false;

        if (!$action) {
            return ;
        }

        if (is_callable($action)) {
            call_user_func_array($action, []);
        }

        if (is_array($action)) {
            call_user_func_array([ new $action[0], $action[1]], []);
        }
    }
}