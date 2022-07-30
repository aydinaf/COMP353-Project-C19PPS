<?php

class Users extends Model
{
    protected $_PKName = ['username'];
    protected $username;
    protected $firstName;
    protected $lastName;
    protected $citizenship;
    protected $email;
    protected $phone;
    protected $pwdChecksum;

    public function __construct($username, $firstName, $lastName, $citizenship, $email, $phone, $pwdChecksum)
    {
        parent::__construct();

        $this->username = $username;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->citizenship = $citizenship;
        $this->email = $email;
        $this->phone = $phone;
        $this->pwdChecksum = $pwdChecksum;
    }
}
