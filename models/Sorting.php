<?php

namespace app\models;

/**
 * Generate sorting block in top of the page with correct view
 * based on get parameters
 */

class Sorting
{
    public $layout = 'sorting.php';

    public $nameActive = false;
    public $emailActive = false;
    public $statusActive = false;

    public $nameUp = false;
    public $emailUp = false;
    public $statusUp = false;

    /**
     * Define table name and sort order
     * @param $sort_param
     */
    public function settings($sort_param)
    {
        if($sort_param) {
            $sort = explode('_', $sort_param);
            $target = isset($sort[0]) ? strtolower($sort[0]) : null;
            $direction = isset($sort[1]) ? strtolower($sort[1]) : null;
            $this->identify($target, $direction);
        } else {
            $this->identify(null, null);
        }

    }

    /**
     * @param $target
     * @param $direction
     */
    public function identify($target, $direction)
    {
        if( ($target == 'name' ||
             $target == 'email' ||
             $target == 'status')
            &&
            ($direction == 'up' ||
             $direction == 'down')
        ) {
            $name = $target.'Active';
            $this->$name = true;

            if($direction == 'up') {
                $direction = $target.'Up';
                $this->$direction = true;
            }
        }
    }

    /**
     * @param Sorting $sorting
     * @return string
     */
    public static function renderSorting(Sorting $sorting)
    {
        ob_start();
        require(ROOT . 'views' . DS . 'layouts' . DS . $sorting->layout);
        $content =  ob_get_clean();

        return $content;
    }
}
