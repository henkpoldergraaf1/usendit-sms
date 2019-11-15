# Usendit-sms for Laravel 5.x & 6

This package makes it easy to build [SMS notifications] for the usendit.co.mz api.


## Installation
Because the package is not registered under packagist you can reference in your composer using a repository entry:
```php
   "repositories": [
        {
            "type": "vcs",
            "name": "tricciardi/usendit-sms",
            "url": "https://github.com/henkpoldergraaf1/usendit-sms"
        }
    ],
    ...
    "require": {
          ... 
          "tricciardi/usendit-sms": "dev-master",
          ...  
    },   
```
Then run composer update

## Config / Get started
Add your account settings to your `.env`:
```php
// .env
...
USENDIT_SENDER=
USENDIT_USERNAME=
USENDIT_PASSWORD=
USENDIT_PARTNEREVENTID=
...
```

Because it supports the Laravel notification channel architecture you can leverage this using
```php
php artisan make:notification SomeNotificationName
```

```php
<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use tricciardi\UsenditSms\Message as UsenditMessage;

class Usendit extends Notification
{
    use Queueable;
    public $message;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->message = $message;
    }
    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [\tricciardi\UsenditSms\Channel::class];
    }

    public function toUsendIt($notifiable)
    {
        try {          
            $messageWrapper = new UsenditMessage($this->message->message);
            $messageWrapper->setRecipient($notifiable->contact_number);
        } catch (\Exception $e) {
            ...
        }       

        return $messageWrapper;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
```
Or you can call it directly

```php
/**
 * Sendout an sms via the api
 * @param string $phoneNumber
 * @param string $message
 * @retrurn SendMessagesResult
 */ 
\tricciardi\UsenditSms\UsenditSms::sms($phoneNumber, $message);

```
## Disclaimer
This is a fork of the package TRicciardi/usendit-sms a laravel implentation of the version 1 usendit.pt api for Laravel (https://api.usendit.pt/v1/remoteusendit.asmx?WSDL).
The package was modified to work with the version 2 of the simular mozambiquan api. (https://api.usendit.co.mz/v2/remoteusendit.asmx?WSDL) 
The package has been adapted to accommodate Laravels channel notification architecture. 
The package should also work with the version 2 of the portugese api (https://api.usendit.pt/v2/remoteusendit.asmx?WSDL) this is not tested AND you should switch the WSDL reference (src/UsenditSms.php:46, src/UsenditSms.php:65).

## Credits
- [Tiago Ricciardi](https://github.com/TRicciardi)

