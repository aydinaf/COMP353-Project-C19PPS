<?php

class branches extends Model
{
    protected $_PKName = ['bID'];
    protected $bName;
    protected $address;
    protected $city;
    protected $postalCode;
    protected $province;
    protected $phone;
    protected $country;

    public function __construct($bName, $address, $city, $postalCode, $province, $phone, $country)
    {
        parent::__construct();

        $this->bName = $bName;
        $this->address = $address;
        $this->city = $city;
        $this->postalCode = $postalCode;
        $this->province = $province;
        $this->phone = $phone;
        $this->country = $country;
    }
}
