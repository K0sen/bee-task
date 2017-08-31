<?php

namespace app\models;

class Security
{
    public $name;
    public $pass;

    /**
     * Security constructor.
     * @param $name
     * @param $pass
     */
    public function __construct($name, $pass)
    {
        $this->name = strtolower($name);
        $this->pass= strtolower($pass);
    }

    /**
     * Check of correct password and name
     * @return bool
     */
    public function validate()
    {
        return $this->name == 'admin' && $this->pass == '123';
    }

}