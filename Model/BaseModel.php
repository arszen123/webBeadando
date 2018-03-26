<?php
/**
 * Created by PhpStorm.
 * User: after8
 * Date: 2/8/18
 * Time: 9:13 PM
 */

namespace Model;


class BaseModel
{

    private $variables;
    private $required;
    private $validator;
    private $valid = null;

    public function setVariables(array $var){
        foreach ($var as $key => $value){
            $this->$key = $value;
        }
    }

    public function validate(){
        $this->valid = true;
        foreach ($this->required as $item){
            if(!isset($this->$item)){
                $this->valid = false;
                return;
            }

        }
    }

    public function isValid(){
        if(is_null($this->valid)){
            throw new \Exception('First need to run '.__CLASS__.'->validate()');
        }
        return $this->valid;
    }
}