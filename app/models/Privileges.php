<?php

class Privileges extends Model
{
    protected $_PKName = ['username', 'right', 'subject'];
    protected $username;
    protected $right;
    protected $subject;

    public function __construct($username, $right, $subject)
    {
        parent::__construct();

        $this->username = $username;
        $this->right = $right;
        $this->subject = $subject;
    }
}
