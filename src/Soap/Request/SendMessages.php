<?php

namespace tricciardi\UsenditSms\Soap\Request;

class SendMessages
{
    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var string
     */
    protected $partnerEventId;

    /**
     * @var string
     */
    protected $smsList;

    /**
     * GetConversionsmsList constructor.
     *
     * @param string $username
     * @param string $password
     * @param string $partnerEventId
     * @param string $smsList
     */
    public function __construct($username, $password, $partnerEventId, $smsList)
    {
        $this->username = $username;
        $this->password = $password;
        $this->partnerEventId = $partnerEventId;
        $this->smsList = $smsList;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getPartnerEventId()
    {
        return $this->partnerEventId;
    }

    /**
     * @return string
     */
    public function getSmsList()
    {
        return $this->smsList;
    }
}
