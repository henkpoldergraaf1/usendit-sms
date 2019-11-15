<?php

namespace tricciardi\UsenditSms\Soap\Request;

class Sms
{
    /**
     * @var string
     */
    protected $PartnerMsgId;

    /**
     * @var string
     */
    protected $Sender;

    /**
     * @var string
     */
    protected $Msisdn;

    /**
     * @var string
     */
    protected $MobileOperator;
    /**
     * @var string
     */
    protected $ExpirationDatetime;
    /**
     * @var string
     */
    protected $Priority;
    /**
     * @var string
     */
    protected $MessageText;
    /**
     * @var string
     */
    protected $ScheduleDatetime;
    /**
     * @var string
     */
    protected $BeginTime;
    /**
     * @var string
     */
    protected $EndTime;
    /**
     * @var string
     */
    protected $WorkingDays;
    /**
     * @var string
     */
    protected $IsFlash;

    /**
     * GetConversionMobileOperator constructor.
     *
     * @param string $PartnerMsgId
     * @param string $Sender
     * @param string $Msisdn
     * @param string $MobileOperator
     */
    public function __construct(
        $PartnerMsgId,
        $Sender,
        $Msisdn,
        $MessageText,
        $MobileOperator = null,
        $Priority = 1,
        $ExpirationDatetime = null,
        $ScheduleDatetime = null,
        $BeginTime = null,
        $EndTime = null,
        $WorkingDays = false,
        $IsFlash = false
    )
    {
        $this->PartnerMsgId = $PartnerMsgId;
        $this->Sender =  $Sender;
        $this->Msisdn = $Msisdn;
        $this->MobileOperator = $MobileOperator;
        $this->ExpirationDatetime = $ExpirationDatetime;
        $this->Priority = $Priority;
        $this->MessageText = $MessageText;
        $this->ScheduleDatetime = $ScheduleDatetime;
        $this->BeginTime = $BeginTime;
        $this->EndTime = $EndTime;
        $this->WorkingDays = $WorkingDays;
        $this->IsFlash = $IsFlash;
    }

    /**
     * @return string
     */
    public function getPartnerMsgId()
    {
        return $this->PartnerMsgId;
    }

    /**
     * @return string
     */
    public function getSender()
    {
        return $this->Sender;
    }

    /**
     * @return string
     */
    public function getMsisdn()
    {
        return $this->Msisdn;
    }

    /**
     * @return string
     */
    public function getMobileOperator()
    {
        return $this->MobileOperator;
    }

    /**
     * @return string
     */
    public function getExpirationDatetime()
    {
        return $this->ExpirationDatetime;
    }

    /**
     * @return string
     */
    public function getPriority()
    {
        return $this->Priority;
    }

    /**
     * @return string
     */
    public function getMessageText()
    {
        return $this->MessageText;
    }

    /**
     * @return string
     */
    public function getScheduleDatetime()
    {
        return $this->ScheduleDatetime;
    }

    /**
     * @return string
     */
    public function getBeginTime()
    {
        return $this->BeginTime;
    }

    /**
     * @return string
     */
    public function getEndTime()
    {
        return $this->EndTime;
    }

    /**
     * @return string
     */
    public function getWorkingDays()
    {
        return $this->WorkingDays;
    }

    /**
     * @return string
     */
    public function getIsFlash()
    {
        return $this->IsFlash;
    }
}
