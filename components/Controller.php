<?php

namespace app\components;

class Controller
{
    public $layout;

    /**
     * Controller constructor.
     * @param string $layout
     */
    public function __construct($layout = 'default')
    {
        if($layout == 'default') {
            $this->layout = Config::get('default_layout');
        } else {
            $this->layout = $layout;
        }

    }

    /**
     * Render layout with variable $content that contain certain view
     * @param $fileName
     * @param array $parameters
     * @return string
     * @throws \Exception
     */
    public function render($fileName, array $parameters = [])
    {
        extract($parameters);
        $tplDir = $this->setDir();
        $file = $this->searchFile($tplDir, $fileName);
        $filePath = ROOT . $tplDir . DS . $file;
        if(!$file) {
            throw new \Exception('View did not found: ' . $fileName, 404);
        }

        ob_start();
        require($filePath);
        $content =  ob_get_clean();

        ob_start();
        require ROOT . 'views' . DS . 'layouts' . DS . $this->layout;
        return ob_get_clean();
    }

    /**
     * Render view without layout for ajax request
     * @param $fileName
     * @param array $parameters
     * @return string
     * @throws \Exception
     */
    public function renderAjax($fileName, array $parameters = [])
    {
        extract($parameters);
        $tplDir = $this->setDir();
        $file = $this->searchFile($tplDir, $fileName);
        $filePath = ROOT . $tplDir . DS . $file;
        if(!$file) {
            throw new \Exception('View did not found: ' . $fileName, 404);
        }

        ob_start();
        require($filePath);
        return ob_get_clean();

    }


    /**
     * Render error page
     * @param \Exception $exception
     * @return string
     */
    public function renderError(\Exception $exception)
    {
        $err_layout = Config::get('error_layout');
        $filePath = ROOT . 'views' . DS . 'layouts' . DS . $err_layout;

        ob_start();
        require($filePath);
        $content =  ob_get_clean();

        ob_start();
        require ROOT . 'views' . DS . 'layouts' . DS . $this->layout;
        return ob_get_clean();
    }

    /**
     * Search directory of view so directory of SiteController will be site
     * Manipulation with composite controller names (like SiteProductController so dir of view will be site-product)
     * *Hope this will be useful in this project    (no)*
     * @return array|mixed|string
     */
    public function setDir() {
        $fullClass = get_class($this);
        $pieces = explode('\\', $fullClass);
        $fullName = array_pop($pieces); //SiteProductController
        $name = str_replace('Controller', '', $fullName);
        preg_match_all('/((?:^|[A-Z])[a-z]+)/', $name, $controller);
        $controller = implode('-', $controller[0]);
        $controller = strtolower($controller);
        return 'views/'.$controller;
    }

    /**
     * Search view in directory that defined by certain controller
     * For TaskController dir will be 'task'
     * @param $directory
     * @param $file
     * @return bool
     */
    public function searchFile($directory, $file)
    {
        $dirFiles = scandir(ROOT . $directory);
        foreach ($dirFiles as $dirFile) {
            if(preg_match("#^$file.#", $dirFile)) {
                return $dirFile;
            }
        }
        return false;
    }

    /**
     * @param $layout
     */
    public function setLayout($layout) {
        $this->layout = $layout;
    }

}