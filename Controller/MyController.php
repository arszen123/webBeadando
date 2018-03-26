<?php
/**
 * Created by PhpStorm.
 * User: after8
 * Date: 2/7/18
 * Time: 10:23 PM
 */

namespace Controller;


use Framework\Input;
use Framework\View;
use Model\LoginForm;

class MyController
{

    public function myGetFunction(){
        $form = new LoginForm();
        $form->validate();
        $form->isValid();
        return View::make('test',['greet'=>'Hello World!']);
    }
}