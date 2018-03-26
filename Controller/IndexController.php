<?php
/**
 * Created by PhpStorm.
 * User: after8
 * Date: 3/24/18
 * Time: 11:25 PM
 */

namespace Controller;


use Framework\View;

class IndexController
{

    public function getIndex()
    {
        return View::make('index');
    }

    public function getPizzas()
    {
        return View::make('pizzas');
    }

    public function getPizza()
    {
        return View::make('pizza');
    }

}