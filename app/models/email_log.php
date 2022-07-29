<?php

class EmailLog extends Model
{
    protected $_PKName = ['recipientEmail', 'datetime'];
    protected $recipientEmail;
    protected $datetime;
    protected $subject;
    protected $body;

    public function __construct($recipientEmail, $datetime, $subject, $body)
    {
        parent::__construct();

        $this->recipientEmail = $recipientEmail;
        $this->datetime = $datetime;
        $this->subject = $subject;
        $this->body = $body;
    }
}
