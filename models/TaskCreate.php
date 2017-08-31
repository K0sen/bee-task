<?php

namespace app\models;

use app\components\Model;
use app\components\Request;
use app\components\DbConnection;

class TaskCreate extends Model
{
    public $name;
    public $email;
    public $text;
    public $status = 0;
    public $file;
    public $filename;
    public $error;
    public $type;
    public $tmp_name;

    /**
     * TaskCreate constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->name = $request->post('name');
        $this->email = $request->post('email');
        $this->text = $request->post('text');
        $this->file = $request->files('file');
        $this->filename = $this->file['name'];
        $this->error = $this->file['error'];
        $this->type = $this->file['type'];
        $this->tmp_name = $this->file['tmp_name'];
    }

    public function rules()
    {
        return [
          [['name', 'email', 'text', 'filename'], "require" => "required"],
          [['name'], 'length' => 20],
          [['email'], 'length' => 50],
          [['text'], 'length' => 1500],
          [['filename'], 'length' => 255],
          [['type'], 'type' => ['image/png', 'image/jpeg', 'image/gif']]
        ];
    }

    /**
     * @param TaskCreate $task
     */
    public function createTask(TaskCreate $task)
    {
        $db = DbConnection::getInstance()->getPdo();
        $sth = $db->prepare('INSERT INTO `tasks` VALUES (NULL, :name, :email, :text, :filename, :status)');
        $params = array(
            'name' => $task->name,
            'email' => $task->email,
            'text' => $task->text,
            'filename' => $task->filename,
            'status' => $task->status,
        );

        $sth->execute($params);
    }
}
