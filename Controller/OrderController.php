<?php
/**
 * Created by PhpStorm.
 * User: after8
 * Date: 3/25/18
 * Time: 4:09 PM
 */

namespace Controller;


use Framework\View;

class OrderController
{

    public function getOrderList()
    {
        return View::make('order');
    }

    public function postOrder()
    {

    }

}