<?php namespace tricciardi\UsenditSms\Soap\Response;

class ScheduleResult {

    /**
     * @var string
     */
    protected $ScheduleStatus;

    /**
     * @var string
     */
    protected $ScheduleMessage;

    /**
     * @var string
     */
    protected $partnerEventId;

    /**
     * @var string
     */
    protected $EventId;

    /**
     * @var string
     */
    protected $PartnerEventId;

    /**
     * GetConversionEventId constructor.
     *
     * @param string $ScheduleStatus
     * @param string $ScheduleMessage
     * @param string $partnerEventId
     * @param string $EventId
     */
    public function __construct($ScheduleStatus, $ScheduleMessage, $partnerEventId, $EventId)
    {
      $this->ScheduleStatus = $ScheduleStatus;
      $this->ScheduleMessage   = $ScheduleMessage;
      $this->partnerEventId     = $partnerEventId;
      $this->EventId       = $EventId;
      $this->PartnerEventId       = $PartnerEventId;
    }

    /**
     * @return string
     */
    public function getScheduleStatus()
    {
      return $this->ScheduleStatus;
    }

    /**
     * @return string
     */
    public function getScheduleMessage()
    {
      return $this->ScheduleMessage;
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
    public function getEventId()
    {
      return $this->EventId;
    }

    // /**
    //  * @return string
    //  */
    // public function getPartnerEventId()
    // {
    //   return $this->PartnerEventId;
    // }
}
