<?php

class Article extends Model
{
    protected $_PKName = ['articleName', 'authorFirstname', 'authorLastname', 'orgID', 'publicationDate'];
    protected $articleName;
    protected $authorFirstname;
    protected $authorLastname;
    protected $orgID;
    protected $publicationDate;
    protected $majorTopic;
    protected $minorTopic;
    protected $summary;

    public function __construct($articleName, $authorFirstname, $authorLastname, $orgID, $publicationDate, $majorTopic, $minorTopic, $summary)
    {
        parent::__construct();

        $this->articleName = $articleName;
        $this->authorFirstname = $authorFirstname;
        $this->authorLastname = $authorLastname;
        $this->orgID = $orgID;
        $this->publicationDate = $publicationDate;
        $this->majorTopic = $majorTopic;
        $this->minorTopic = $minorTopic;
        $this->summary = $summary;
    }
}
