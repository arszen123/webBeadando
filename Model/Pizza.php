<?php
/**
 * Created by PhpStorm.
 * User: after8
 * Date: 3/26/18
 * Time: 8:25 PM
 */

namespace Model;


use Framework\DBConnection;

class Pizza extends DBConnection
{

    const SIZE_28 = 1;
    const SIZE_38 = 2;
    const SIZE_60 = 3;
    const SIZE_100 = 4;

    protected $fileName = 'pizzas.csv';

    protected $workCols = 'id,name,description,price,availability';

    protected $key = 'id';

    private $id;
    private $name;
    private $description;
    private $price;
    private $availability;

    private $size;

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param mixed $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    private $number;

    public function __construct($data = array())
    {
        $this->setUpModel($data);
    }

    public function setUpModel($data = array())
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param null $size
     * @return mixed
     */
    public function getPrice($size = null)
    {
        $diff = 0;
        $size = $size === null ? $this->size : $size;
        if ($size > 1) {
            $diff = ($size * $this->price * 0.25);
        }
        return $this->price + $diff;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getAvailability()
    {
        return $this->availability;
    }

    /**
     * @param mixed $availability
     */
    public function setAvailability($availability)
    {
        $this->availability = $availability;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    public function validate()
    {
        $this->validator = [
            'name' => 'required',
            'price' => 'required',
        ];

        parent::validate();
    }

    public function isValid()
    {
        return $this->valid;
    }

    public function getSizeToHuman()
    {
        if ($this->size === $this::SIZE_28) {
            return '28 cm';
        }
        if ($this->size === $this::SIZE_38) {
            return '38 cm';
        }
        if ($this->size === $this::SIZE_60) {
            return '60 cm';
        }
        if ($this->size === $this::SIZE_100) {
            return '100 cm';
        }
    }

    public function getCost()
    {
        $diff = 0;
        $size = $this->size;
        if ($size > 1) {
            $diff = ($size * $this->price * 0.25);
        }
        return $this->price + $diff;
    }
}