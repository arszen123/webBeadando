<?php
/**
 * Created by PhpStorm.
 * User: after8
 * Date: 3/26/18
 * Time: 8:24 PM
 */

namespace Controller;


use Framework\Input;
use Framework\Redirect;
use Framework\View;
use Model\Order;
use Model\Pizza;
use Model\User;

class AdminController
{

    public function editPizza()
    {
        if (!User::isLoggedInUser() || !User::getAuthUser()->isAdmin()) {
            return Redirect::to('/');
        }
        $pizza = new Pizza();
        $pizzaToEdit = $pizza;
        if (Input::get('pizza') !== null) {
            $pizzaToEdit = $pizza->getBy(['id' => Input::get('pizza')])[0];
        }
        return View::make('admin',
            ['pizzas' => $pizza->getBy(), 'pizzaToEdit' => $pizzaToEdit]);
    }

    public function savePizza()
    {
        if (!User::isLoggedInUser() || !User::getAuthUser()->isAdmin()) {
            return Redirect::to('/');
        }
        $pizza = new Pizza();
        if (isset($_POST['id'])) {
            $pizza = $pizza->getBy(['id' => $_POST['id']]);
            if (count($pizza) !== 1) {
                return Redirect::to('/admin');
            }
            $pizza = $pizza[0];
            $url = '?pizza=' . $_POST['id'];
        }

        $pizza->setUpModel($_POST);
        $pizza->validate();
        if (!$pizza->isValid()) {
            return Redirect::to('/admin');
        }
        if (isset($_POST['id'])) {
            $pizza->update();
        } else {
            $pizza->save();
        }
        $id = end($pizza->getBy())->getId();
        $info = pathinfo($_FILES['pizza-image']['name']);
        $newName = 'pizza_' . $id . '.png';

        $target = WEBAPP_ROOT . '/assets/pizzas/' . $newName;
        move_uploaded_file($_FILES['pizza-image']['tmp_name'], $target);

        return Redirect::to('/admin' . $url);
    }

    public function listOrders()
    {
        if (!User::isLoggedInUser() || !User::getAuthUser()->isAdmin()) {
            return Redirect::to('/');
        }
        $orders = new Order();
        $orders = $orders->getBy(['done' => 0]);
        return View::make('order_list', ['orders' => $orders]);
    }

    public function orderDone()
    {
        /** Should be replaced with before */
        if (!User::isLoggedInUser() || !User::getAuthUser()->isAdmin()) {
            return Redirect::to('/');
        }
        $order = new Order();
        $order = $order->getBy(['id' => $_GET['id']])[0];
        $order->setDone(1);
        $order->update();
        return Redirect::to('/admin/order/list');
    }

}