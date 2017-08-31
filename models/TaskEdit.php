<?php

namespace app\models;

use app\components\DbConnection;

class TaskEdit
{
    public $id;
    public $text;
    public $status;

    /**
     * TaskEdit constructor.
     * @param $text
     * @param $status
     * @param $id
     */
    public function __construct($text, $status, $id)
    {
        $this->id = $id;
        $this->text = $text;
        $this->status = $status == 'true' ? 1 : 0;
    }

    /**
     *
     */
    public function edit()
    {
        $db = DbConnection::getInstance()->getPdo();

        $query = $db->prepare("UPDATE `tasks` SET `text` = :text, `status` = :status WHERE id = :id");
        $params = array(
            'id' => $this->id,
            'text' => $this->text,
            'status' => $this->status
        );
        $query->execute($params);
    }
}
