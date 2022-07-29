<?php

class Organization extends Model
{
    protected $_PKName = ['orgID'];
    protected $orgID;
    protected $orgName;
    protected $orgType;

    public function __construct($orgID, $orgName, $orgType)
    {
        parent::__construct();

        $this->orgID = $orgID;
        $this->orgName = $orgName;
        $this->orgType = $orgType;
    }
}
