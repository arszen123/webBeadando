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
use Mail\OrderNotifiMail;
use Model\Order;
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
        if (!User::isLoggedInUser()) {
            return Redirect::to('/login');
        }
        if (User::getAuthUser()->getOrderList() == null || empty(User::getAuthUser()->getOrderList())) {
            return Redirect::to('/pizzas');
        }
        //Talán kiküldi, talán nem.
        $mail = new OrderNotifiMail(User::getAuthUser());
        $mail->send();

        $order = new Order(User::getAuthUser());
        $order->save();
        User::getAuthUser()->setOrder(null);
        return View::make('success');
    }

    public function getBill()
    {

        if (!User::isLoggedInUser()) {
            return Redirect::to('/login');
        }
        /** @var User $user */
        $user = User::getAuthUser();
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
                if ($pizzas[$i]->getNumber() !== 0) {
                    $pizzas[$i]->setSize(isset($order['type'][$i]) ? (int)$order['type'][$i] : Pizza::SIZE_28);
                    $newPizzas[] = $pizzas[$i];
                }
            }
        }
        $user->setOrder($newPizzas);
        $_SESSION['loggedInUser'] = $user;
        return View::make('bill',['user' => $user, 'pizzas' => $newPizzas]);
    }

}