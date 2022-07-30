<?php

class ProStaTers extends Model
{
    protected $_PKName = ['prostaterName', 'countryName'];
    protected $prostaterName;
    protected $countryName;
    protected $population;

    public function __construct($prostaterName, $countryName, $population)
    {
        parent::__construct();

        $this->prostaterName = $prostaterName;
        $this->countryName = $countryName;
        $this->population = $population;
    }
}
