<?php

namespace app\components;

class App
{

    public function run($config)
    {
        try {
            Session::start();
            Config::init($config);
            $request = new Request();
            Router::setRoute($request);

            //define controller and action through route
            $controller = '\app\controllers\\'.Router::$controller;
            $action = Router::$action;

            //run action of certain controller
            $controller = new $controller();
            $content = $controller->$action();

        } catch (\Exception $e) {
            $controller = new Controller();
            $content = $controller->renderError($e);
        }

        //display page
        echo $content;

    }

}