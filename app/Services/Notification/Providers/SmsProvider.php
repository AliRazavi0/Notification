<?php
namespace App\Services\Notification\Providers;
use App\Services\Notification\Regulation\Provider;
use App\User;
use Carbon\Carbon;
use GuzzleHttp\Client;


class SmsProvider implements Provider{

    private $user;
    private $text;
    public function __construct(User $user,String $text)
    {
        $this->user=$user;
        $this->text=$text;
    }
    public static function getToken()
    {
        $client = new Client();
        $data = [
            'UserApiKey' => config('services.sms.auth.api'),
            'SecretKey' => config('services.sms.auth.pass'),
        ];
        $responseToken = $client->post(config('services.sms.token_url'), [
            'json' => $data
        ]);
        return json_decode($responseToken->getBody())->TokenKey;
    }

    public function send()
    {
        $this->handelErrorPhone();
        $client = new Client();

        $response = $client->post(config('services.sms.url'), [
            'json' =>$this->preperData(),
            'headers' => $this->getHeader(),
        ]);
        return response('پیام شما با موفقیت ارسال گردید',200);
    }

    public  function preperData()
    {
        $data = [
            'Messages' => [$this->text],
            'MobileNumbers' => [$this->user->phone],
            'LineNumber' => config('services.sms.auth.from'),
            'SendDateTime' => Carbon::now(),
            'CanContinueInCaseOfError' => false,
        ];
        return $data;
    }


    public  function getHeader (){
        $headers = [
            'Content-Type' => 'application/json',
            'x-sms-ir-secure-token' => self::getToken(),
        ];
        return $headers;
    }

    public function handelErrorPhone(){
       if (!$this->user->phone){
            throw new Exception("phone does not exist");
       }
    }
}
