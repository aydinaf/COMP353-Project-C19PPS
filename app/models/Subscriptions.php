<?php

class Subscriptions extends Model
{
    protected $_PKName = ['username', 'authorUsername', 'organization'];
    protected $username;
    protected $authorUsername;
    protected $organization;

    public function __construct($username, $authorUsername, $organization)
    {
        parent::__construct();

        $this->username = $username;
        $this->authorUsername = $authorUsername;
        $this->organization = $organization;
    }
}
