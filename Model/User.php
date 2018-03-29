<?php
/**
 * Created by PhpStorm.
 * User: after8
 * Date: 3/25/18
 * Time: 6:27 PM
 */

namespace Model;


use Framework\DBConnection;

class User extends DBConnection
{

    protected $fileName = 'users.csv';

    protected $workCols = 'name,email,password,phone,country,address';

    protected $authSuccess = false;

    private $id;
    private $name;
    private $email;
    private $password;
    private $phone;
    private $country;
    private $address;

    private $orderList;

    /**
     * @return array
     */
    public function getOrderList()
    {
        return $this->orderList;
    }

    /**
     * @param Pizza $pizza
     */
    public function addOrder($pizza)
    {
        $this->orderList[] = $pizza;
    }

    /**
     * @param array $pizzas
     */
    public function setOrder($pizzas)
    {
        $this->orderList = $pizzas;
    }

    public function __construct($data = array())
    {
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $this->$key = $value;
            }
        }
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function validate()
    {
        $this->validator = [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'address' => 'required',
            'country' => 'required',
            'phone' => 'required'
        ];
        parent::validate();
    }

    public function isValid()
    {
        return $this->valid;
    }

    public function auth($password)
    {
        if (hash('sha256', $password) === $this->password) {
            $this->authSuccess = true;
        }
    }

    public function isAuth()
    {
        return $this->authSuccess;
    }

}