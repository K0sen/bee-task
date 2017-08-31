<?php

namespace app\models;

use app\components\DbConnection;

class TaskAppear
{

    /**
     * @param $page
     * @param $limit
     * @param $sort
     * @return array
     */
    public function findTasks($page, $limit, $sort)
    {
        $offset = $page * $limit - $limit;
        if($sort) {
            $sort = explode('_', $sort);
            $target = isset($sort[0]) ? strtolower($sort[0]) : null;
            $direction = isset($sort[1]) ? strtolower($sort[1]) : null;
            $order = $this->generateOrder($target, $direction);
        } else {
            $order = $this->generateOrder(null, null);
        }

        $db = DbConnection::getInstance()->getPdo();
        $query = $db->query("SELECT * FROM `tasks`
                              $order
                              LIMIT $limit OFFSET $offset
                              ");
        $query->execute();

        $tasks = $query->fetchAll(\PDO::FETCH_ASSOC);

        return $tasks;
    }

    /**
     * @return mixed
     */
    public function taskCount()
    {
        $db = DbConnection::getInstance()->getPdo();
        $query = $db->query("SELECT COUNT(*) FROM `tasks`");
        $query->execute();
        $task_amount = $query->fetch();

        return $task_amount[0];
    }

    /**
     * @param $target
     * @param $direction
     * @return string
     */
    public function generateOrder($target, $direction)
    {
        if( ($target == 'name' ||
            $target == 'email' ||
            $target == 'status')
            &&
            ($direction == 'up' ||
            $direction == 'down')
        ) {
            $direction = $direction == 'up' ? 'ASC' : 'DESC';
            return "ORDER BY `$target` $direction";
        } else {
            return "ORDER BY `id` DESC";
        }
    }

    /**
     * @param $image
     * @return bool
     */
    public static function imageExist($image)
    {
        $upload_dir = ROOT . 'web' . DS . 'images' . DS . 'tasks' . DS;
        $img_dir = $upload_dir . $image;

        return file_exists($img_dir);
    }
}