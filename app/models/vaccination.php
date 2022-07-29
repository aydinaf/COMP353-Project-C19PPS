<?php

class Vaccination extends Model
{
    protected $_PKName = ['prostaterName', 'vaccineName'];
    protected $prostaterName;
    protected $vaccineName;
    protected $vaccinated;

    public function __construct($prostaterName, $vaccineName, $vaccinated)
    {
        parent::__construct();

        $this->prostaterName = $prostaterName;
        $this->vaccineName = $vaccineName;
        $this->vaccinated = $vaccinated;
    }
}
