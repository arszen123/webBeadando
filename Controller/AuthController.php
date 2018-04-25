<?php
/**
 * Created by PhpStorm.
 * User: after8
 * Date: 3/24/18
 * Time: 11:35 PM
 */

namespace Controller;


use Framework\Redirect;
use Framework\View;
use Model\User;
use Util\Password;

class AuthController
{

    public function getLogin()
    {
        return View::make('login');
    }

    public function postLogin()
    {
        /** Fake User */
        if (User::isLoggedInUser()) {
            return Redirect::to('/');
        }
        $user = new User();
        $t = $user->getBy(['email' => $_POST['email']]);

        if (count($t) != 1) {
            return Redirect::to('/login');
        }

        /** @var User $user */
        $user = $t[0];
        $user->auth($_POST['password']);
        if (!$user->isAuth()) {
            return Redirect::to('/login');
        }
        /** Keep the cart */
        $orderList = $_SESSION['loggedInUser']->getOrderList();
        $_SESSION['loggedInUser'] = $user;
        $_SESSION['loggedInUser']->setOrder($orderList);

        return Redirect::to('/');
    }

    public function getRegistration()
    {
        return View::make('registration');
    }

    public function postRegistration()
    {
        $user = new User($_POST);
        $user->setPassword(Password::hash($user->getPassword()));
        $fakeUser = $user->getBy(['email' => $user->getEmail()]);
        if (count($fakeUser) !== 0) {
            return Redirect::to('/register');
        }
        $user->validate();
        if (!$user->isValid()) {
            return Redirect::to('/');
        }
        $user->save();
        return Redirect::to('/login');
    }

    public function anyLogout()
    {
        unset($_SESSION['loggedInUser']);
        session_destroy();
        return Redirect::to('/');
    }

}