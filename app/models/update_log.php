<?php

class UpdateLog extends Model
{
    protected $_PKName = ['orgID', 'date'];
    protected $orgID;
    protected $date;
    protected $prostaterName;
    protected $vaccineName;
    protected $vaccinated;
    protected $infections;
    protected $deaths;

    public function __construct($orgID, $date, $prostaterName, $vaccineName, $vaccinated, $infections, $deaths)
    {
        parent::__construct();

        $this->orgID = $orgID;
        $this->date = $date;
        $this->prostaterName = $prostaterName;
        $this->vaccineName = $vaccineName;
        $this->vaccinated = $vaccinated;
        $this->infections = $infections;
        $this->deaths = $deaths;
    }
}
