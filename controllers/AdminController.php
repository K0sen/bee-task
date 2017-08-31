<?php

namespace app\controllers;

use app\components\Controller;
use app\components\Request;
use app\components\Session;
use app\models\Security;
use app\models\TaskEdit;

class AdminController extends Controller
{
    /**
     * Render window for enter
     * @return string
     * @throws \Exception
     */
    public function actionEnter()
    {
        return $this->renderAjax('enter');
    }

    /**
     * Delete 'user' from key, cause user logout
     */
    public function actionExit()
    {
        $user = Session::get('user');
        if($user) {
            Session::remove('user');
        }
    }

    /**
     * Check name and pass
     */
    public function actionAuthentication() {
        $request = new Request();
        $name = $request->post('name');
        $pass = $request->post('pass');

        $security = new Security($name, $pass);
        if($security->validate()) {
            Session::set('user', 'admin');
            echo 1;
        }

        echo null;
    }

    /**
     * Render edit window
     * @return string
     * @throws \Exception
     */
    public function actionEditRender()
    {
        return $this->renderAjax('edit');
    }

    /**
     * Simply edit a task (if user is admin)
     */
    public function actionEdit()
    {
        $request = new Request();
        $text = $request->post('text');
        $status = $request->post('status');
        $id = $request->post('id');

        if(Session::get('user') == 'admin') {
            $edit_model = new TaskEdit($text, $status, $id);
            $edit_model->edit();
        } else {
            Session::setFlash('You can\'t edit tasks');
        }

    }

}