<?php
/**
 * Created by PhpStorm.
 * User: after8
 * Date: 3/26/18
 * Time: 8:24 PM
 */

namespace Controller;


use Framework\DefaultController;
use Framework\Input;
use Framework\Redirect;
use Framework\View;
use Model\Pizza;

class AdminController
{

    public function editPizza()
    {
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
        $pizza = new Pizza();
        if (isset($_POST['id'])) {
            $pizza = $pizza->getBy(['id' => $_POST['id']]);
            if (count($pizza) !== 1) {
                return Redirect::to('/admin');
            }
            $pizza = $pizza[0];
        }
        var_dump($_POST);
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
        return Redirect::to('/pizzas');
    }

}