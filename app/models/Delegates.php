<?php

class Delegates extends Model
{
    protected $_PKName = ['username', 'orgID'];
    protected $username;
    protected $orgID;

    public function __construct($username, $orgID)
    {
        parent::__construct();

        $this->username = $username;
        $this->orgID = $orgID;
    }
}
