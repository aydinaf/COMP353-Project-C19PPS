<?php

class Subscription extends Model
{
    protected $_PKName = ['username', 'authorFirstname', 'authorLastname', 'orgID'];
    protected $username;
    protected $authorFirstname;
    protected $authorLastname;
    protected $orgID;

    public function __construct($username, $authorFirstname, $authorLastname, $orgID)
    {
        parent::__construct();

        $this->username = $username;
        $this->authorFirstname = $authorFirstname;
        $this->authorLastname = $authorLastname;
        $this->orgID = $orgID;
    }
}
