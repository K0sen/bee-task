<?php

namespace app\components;

class Alert extends Session
{
    private static $types = ['warning', 'danger', 'info', 'success'];

    /**
     * Returns 'flash' message and delete it from session
     * Maybe, inserting html in component is "mauvais ton", but i'm a badass
     * @return null|string
     */
    public static function getFlash()
    {
        $flash = static::get('flash');
        static::remove('flash');
        if(!$flash) return null;

        if(array_search($flash['type'], self::$types) != -1) {
            $type = 'alert-' . $flash['type'];
        } else {
            $type = 'alert-info';
        }
        $message = $flash['message'];

        $content = <<< HTML
        <div class="alert $type  alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            $message
        </div>
HTML;
        return $content;
    }

    /**
     * Sets 'flash' message to session
     * @param string $type
     * @param $message
     */
    public static function setFlash($type = 'info', $message)
    {
        static::set('flash', ['message' => $message, 'type' => $type] );
    }

}
