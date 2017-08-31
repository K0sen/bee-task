<?php

namespace app\components;

class Router
{
    public static $controller;
    public static $action;

    /**
     * Define controller and action
     * @param Request $request
     * @throws \Exception
     */
    public static function setRoute(Request $request)
    {
        $uri = $request->getURI();
        $routes = Config::get('routes');

        $internalRoute = self::match($uri, $routes);

        if(!$internalRoute) {
            throw new \Exception('Invalid route: ' . $uri, 404);
        }

        self::$controller = self::setCaCaName(array_shift($internalRoute)) . 'Controller';
        self::$action = 'action' . self::setCaCaName(array_shift($internalRoute));

        if($internalRoute) {
            foreach($internalRoute as $property) {
                $property = explode(':', $property);
                $property = [$property[0] => $property[1]];
                $request->mergeGet($property);
            }
        }

    }

    /**
     * compare incoming uri with route names
     * @param $uri
     * @param $routes
     * @return array|bool|mixed
     */
    public static function match($uri, $routes)
    {
        foreach ($routes as $name => $route) {
            $uri = strtolower(trim($uri, '/'));

            if(preg_match("#^$name$#", $uri)) {
                $internalRoute = preg_replace("#^$name$#", $route, $uri);
                $internalRoute = explode('/', $internalRoute);

                return $internalRoute;
            }
        }

        return false;
    }

    /**
     * set composite name (like site-product) to upperCamelCase
     * @param $name
     * @param $type
     * @return string
     */
    public static function setCaCaName($name)
    {
        $fullName = '';
        $n_parts = explode('-', $name);
        foreach ($n_parts as $part) {
            $fullName .= ucfirst($part);
        }
        return $fullName;
    }

    /**
     * Redirect to certain uri
     * @param $uri
     */
    public static function redirect($uri)
    {
        header("Location: $uri");
        die();
    }

}