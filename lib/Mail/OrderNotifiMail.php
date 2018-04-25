<?php
/**
 * Created by PhpStorm.
 * User: after8
 * Date: 4/7/18
 * Time: 10:54 AM
 */

namespace Mail;


use Framework\Mailer;
use Model\User;

class OrderNotifiMail extends Mailer
{

    protected $templateName = 'order.php';

    public function __construct($user)
    {
        $this->configure($user);
    }

    public function configure($user)
    {
        /** @var $user User */
        $this->setTo($user->getEmail());
        $this->setSubject('Rendelését felvettük!');
        $this->setModel([
            'name' => $user->getName(),
            'address' => $user->getAddress(),
            'pizzas' => $user->getOrderList(),
        ]);
        $this->initHeaders();
        $this->setHeaders('Content-Type', 'text/html; charset=utf-8');
    }

}