<?php namespace tricciardi\UsenditSms;


use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use Artisaninweb\SoapWrapper\SoapWrapper;
use tricciardi\UsenditSms\Soap\Request\SendMessage;
use tricciardi\UsenditSms\Soap\Response\ScheduleResult;
use tricciardi\UsenditSms\Soap\Request\Sms;

class UsenditSms
{
  /**
   * @var SoapWrapper
   */
  protected $soapWrapper;

  /**
   * SoapController constructor.
   *
   * @param SoapWrapper $soapWrapper
   */
  public function __construct()
  {
    $this->soapWrapper = new SoapWrapper;
  }

  public static function sms($to, $message) {
    $soap = new UsenditSms;
    return $soap->send($to, $message);
  }

  public static function batch($items) {
    $soap = new UsenditSms;
    return $soap->sendBatch($items);
  }

  public function send($to, $message) {
    $this->soapWrapper->add('SendMessages', function ($service) {
      $service
      ->wsdl('https://api.usendit.pt/v1/remoteusendit.asmx?WSDL')
      ->trace(true)->classmap([
          SendMessage::class,
          ScheduleResult::class,
        ]);
    });
    $sms = new Sms(config('usenditsms.partnereventid'),config('usenditsms.sender'),$to,$message);
    $response = $this->soapWrapper->call('SendMessages.SendMessages', [
      new SendMessage(config('usenditsms.username'), config('usenditsms.password'), null, [$sms])
    ]);

    return $response;
  }

  public function sendBatch($items) {
    $this->soapWrapper->add('SendMessages', function ($service) {
      $service
      ->wsdl('https://api.usendit.pt/v1/remoteusendit.asmx?WSDL')
      ->trace(true)->classmap([
          SendMessage::class,
          ScheduleResult::class,
        ]);
    });
    $smsList = [];
    foreach($items as $item) {
      $sms = new Sms(config('usenditsms.partnereventid'),config('usenditsms.sender'),$item->to,$item->message);
      $smsList[] = $sms;
    }
    $response = $this->soapWrapper->call('SendMessages.SendMessages', [
      new SendMessage(config('usenditsms.username'), config('usenditsms.password'), null, $smsList)
    ]);
    return $response;
  }
}
