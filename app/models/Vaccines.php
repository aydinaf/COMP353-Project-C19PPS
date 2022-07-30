<?php

class Vaccines extends Model
{
    protected $_PKName = ['vaccineName'];
    protected $vaccineName;

    public function __construct($vaccineName)
    {
        parent::__construct();

        $this->vaccineName = $vaccineName;
    }
}
