<?php

namespace app\controllers;

use app\components\Controller;
use app\components\Pagination;
use app\components\Request;
use app\components\Router;
use app\components\Alert;
use app\models\Sorting;
use app\models\TaskAppear;
use app\models\TaskCreate;

class TaskController extends Controller
{
    /**
     * Home page
     * @return string
     * @throws \Exception
     */
    public function actionIndex()
    {
        $request_m = new Request();

        //settings for pagination and display tasks on page
        $page = (int) $request_m->get('page');
        if(!$page) {
            $page = 1;
        }
        $max_pages = 5;
        $tasks_on_page = 3;
        $get_key = 'sort';
        $sort_param = $request_m->get($get_key);

        //sort object
        $sorting = new Sorting();
        $sorting->settings($sort_param);

        //search tasks
        $task_m = new TaskAppear();
        $tasks = $task_m->findTasks($page, $tasks_on_page, $sort_param);

        //create pagination object
        $pagination = new Pagination();
        $task_amount = $task_m->taskCount();
        $params_line = is_null($sort_param) ? null : '?'.$get_key.'='.$sort_param;
        $pagination->settings($max_pages, $tasks_on_page, $page, $task_amount, $params_line);

        return $this->render('index', ['tasks' => $tasks,
                                        'pagination' => $pagination,
                                        'sorting' => $sorting ]);
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function actionCreate()
    {
        $request = new Request();
        $task = new TaskCreate($request);
        if ($request->isPost()){
            if($task->validate()){
                $upload_dir = ROOT . 'web' . DS . 'images' . DS . 'tasks' . DS;
                $task->createTask($task);
                $move = move_uploaded_file($task->tmp_name, $upload_dir . $task->filename);
                if (!$move ) {
                    throw new \Exception('Cannot upload file');
                }

                Alert::setFlash('success', 'A task was created');
                Router::redirect('/');
            }
            Alert::setFlash('danger', 'Fill all fields or upload image in format JPG/GIF/PNG or reduce field length (character limit: name - 20, email - 50, text - 1500)');
        }

        return $this->render('create', ['task' => $task]);
    }

    /**
     * Ajax preview window
     * @return string
     * @throws \Exception
     */
    public function actionPreview()
    {
        return $this->renderAjax('preview');
    }
}