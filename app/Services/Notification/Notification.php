<?php
namespace App\Services\Notification;

use App\Services\Notification\Regulation\Provider;

/**
 * @method  SendSms(\App\User $user,String $text)
 * @method  SendEmail(\App\User $user,\Illuminate\Mail\Mailable $mailable)
 */
class Notification
{
    public function __call($method,$argoument){
        $providerPath=__NAMESPACE__."\\"."Providers\\".substr($method,4)."Provider";
        if (!class_exists($providerPath)){
            throw new \Exception('class does not exist');
        }
        $providerInstance=new $providerPath(...$argoument);
        if (! is_subclass_of($providerPath,Provider::class)){
            throw new \Exception('class must implements \App\Services\Notification\Regulation\Provider');
        }
        return $providerInstance->send();
    }
}
