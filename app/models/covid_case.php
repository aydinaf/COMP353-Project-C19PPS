<?php

class CovidCase extends Model
{
    protected $_PKName = ['vaccineName', 'prostaterName'];
    protected $vaccineName;
    protected $prostaterName;
    protected $infections;
    protected $deaths;

    public function __construct($vaccineName, $prostaterName, $infections, $deaths)
    {
        parent::__construct();

        $this->vaccineName = $vaccineName;
        $this->prostaterName = $prostaterName;
        $this->infections = $infections;
        $this->deaths = $deaths;
    }
}
