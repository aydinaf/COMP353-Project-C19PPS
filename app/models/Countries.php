<?php

class Countries extends Model
{
    protected $_PKName = ['countryName'];
    protected $countryName;
    protected $regionName;
    protected $orgID;

    public function __construct($countryName, $regionName, $orgID)
    {
        parent::__construct();

        $this->countryName = $countryName;
        $this->regionName = $regionName;
        $this->orgID = $orgID;
    }
}
