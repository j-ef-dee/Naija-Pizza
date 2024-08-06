<?php

class UserValidator
{

    private $data;
    private $errors = [];
    private static $fields = ['username', 'email'];

    public function __construct($post_data)
    {
        $this->data = $post_data;
    }

    public function valifateForm(){
        foreach(self::$fields as $field){
            if(!array_key_exists($field, $this->data)){
                trigger_error("$field is not present in data");
                return;
            }
        }

        $this->validateUsername();
        $this->validateEmail();
    }

    private function validateUsername(){
        $val = trim($this->data['username']);

        if(empty($val)){
            $this->addError('username', 'username cannot be empty');
        }
    }

    private function validateEmail(){

    }

    private function addError(){
        $this->errors[$key] = $val;

    }
}
