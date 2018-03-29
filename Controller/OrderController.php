<?php
/**
 * Created by PhpStorm.
 * User: after8
 * Date: 3/25/18
 * Time: 4:09 PM
 */

namespace Controller;


use Framework\Redirect;
use Framework\View;
use Model\Pizza;
use Model\User;

/**
 * Class OrderController
 * @package Controller
 */
class OrderController
{

    public function getOrderList()
    {
        $orderList = $_SESSION['loggedInUser']->getOrderList();
        return View::make('order',['orderList' => $orderList]);
    }

    public function makeOrder()
    {
        //send Mail us, him/her
    }

    public function getBill()
    {
        /** @var User $user */
        $user = $_SESSION['loggedInUser'];
        $pizzas = $user->getOrderList();
        $order = $_POST;
        $newPizzas = [];
        for ($i=0;$i<count($pizzas);$i++) {
            if(
                isset($order['id'][$i]) &&
                isset($order['item'][$i]) &&
                ((int)$order['id'][$i]) === (int)$pizzas[$i]->getId()
            ) {
                $pizzas[$i]->setNumber($order['item'][$i]<0 ? 0 : $order['item'][$i]);
                $pizzas[$i]->setSize($order['type'][$i] | Pizza::SIZE_28);
                $newPizzas[] = $pizzas[$i];
            }
        }
        $user->setOrder($newPizzas);
        $_SESSION['loggedInUser'] = $user;
        return View::make('bill',['user' => $user, 'pizzas' => $newPizzas]);
    }

}