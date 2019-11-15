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

## Config
Add your account settngs to your `.env`:
```php
// .env
...
USENDIT_SENDER=
USENDIT_USERNAME=
USENDIT_PASSWORD=
USENDIT_PARTNEREVENTID=
...
```


## Usage
```php
/**
 * Sendout an sms via the api
 * @param string $phoneNumber
 * @param string $message
 * @retrurn SendMessagesResult
 */ 
UsenditSms::sms($phoneNumber, $message);

```
## Disclaimer
This is a fork of the package TRicciardi/usendit-sms a laravel implentation of the version 1 usendit.pt api for Laravel (https://api.usendit.pt/v1/remoteusendit.asmx?WSDL).
The package was modified to work with the version 2 of the simular mozambiquan api. (https://api.usendit.co.mz/v2/remoteusendit.asmx?WSDL) 
The package should also work with the version 2 of the portugese api (https://api.usendit.pt/v2/remoteusendit.asmx?WSDL) this is not tested AND you should switch the WSDL reference (src/UsenditSms.php:46, src/UsenditSms.php:65).

## Credits
- [Tiago Ricciardi](https://github.com/TRicciardi)

