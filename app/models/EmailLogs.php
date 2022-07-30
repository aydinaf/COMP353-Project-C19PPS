<?php

class EmailLogs extends Model
{
    protected $_PKName = ['recipientEmail', 'dateTime'];
    protected $recipientEmail;
    protected $dateTime;
    protected $subject;
    protected $body;

    public function __construct($recipientEmail, $dateTime, $subject, $body)
    {
        parent::__construct();

        $this->recipientEmail = $recipientEmail;
        $this->dateTime = $dateTime;
        $this->subject = $subject;
        $this->body = $body;
    }
}
