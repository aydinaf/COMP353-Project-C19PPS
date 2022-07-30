<?php

class Articles extends Model
{
    protected $_PKName = ['articleName', 'authorFirstname', 'authorLastname', 'orgID', 'publicationDate'];
    protected $articleName;
    protected $authorUsername;
    protected $orgID;
    protected $publicationDate;
    protected $majorTopic;
    protected $minorTopic;
    protected $summary;

    public function __construct($articleName, $authorUsername, $orgID, $publicationDate, $majorTopic, $minorTopic, $summary)
    {
        parent::__construct();

        $this->articleName = $articleName;
        $this->authorUsername = $authorUsername;
        $this->orgID = $orgID;
        $this->publicationDate = $publicationDate;
        $this->majorTopic = $majorTopic;
        $this->minorTopic = $minorTopic;
        $this->summary = $summary;
    }
}
