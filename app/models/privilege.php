<?php

class Privilege extends Model
{
    protected $_PKName = ['username', 'permission', 'item'];
    protected $username;
    protected $permission;
    protected $item;

    public function __construct($username, $permission, $item)
    {
        parent::__construct();

        $this->username = $username;
        $this->permission = $permission;
        $this->item = $item;
    }
}
