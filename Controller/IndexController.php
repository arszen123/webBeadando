<?php
/**
 * Created by PhpStorm.
 * User: after8
 * Date: 3/24/18
 * Time: 11:25 PM
 */

namespace Controller;


use Framework\Redirect;
use Framework\View;
use Model\Pizza;

class IndexController
{

    public function getIndex()
    {
        return View::make('index');
    }

    public function getPizzas()
    {
        $pizza = new Pizza();
        $pizzas = $pizza->getBy();
        $newPizzas = [];
        foreach ($pizzas as $pizza) {
            if(trim($pizza->getAvailability()) === 'on') {
                $newPizzas[] = $pizza;
            }
        }
        return View::make('pizzas', ['pizzas' => $newPizzas]);
    }

    public function getPizza()
    {
        $pizza = new Pizza();
        $pizza = $pizza->getBy(['id' => $_GET['id']]);
        if(count($pizza) !== 1)
            return Redirect::to('/pizzas');
        return View::make('pizza',['pizza' => $pizza[0]]);
    }

    public function addPizza()
    {
        $pizza = new Pizza();
        $pizza = $pizza->getBy(['id', $_GET['id']]);
        if (count($pizza) === 1) {
            $_SESSION['loggedInUser']->addOrder($pizza[0]);
        }

        return Redirect::to('/pizzas');
    }

}