<?php

class Region extends Model
{
    protected $_PKName = ['regionName'];
    protected $regionName;

    public function __construct($regionName)
    {
        parent::__construct();

        $this->regionName = $regionName;
    }
}
