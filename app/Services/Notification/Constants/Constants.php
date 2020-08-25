<?php


namespace App\Services\Notification\Constants;

use App\Mail\CreateUser;
use App\Mail\ForgetPassword;
use App\Mail\TopicCreated;
use InvalidArgumentException;


class Constants
{
    const CREATE_USER=1;
    const TOPIC_CREATED=2;
    const FORGET_PASSWORD=3;

    public static function toString()
    {
        return[
            self::CREATE_USER=>'کاربر جدید',
            self::TOPIC_CREATED=>'مقاله جدید',
            self::FORGET_PASSWORD=>'فراموشی رمز عبور'
        ];
    }

    public static function toMail ($type){
       try {
        $mails=[
            self::CREATE_USER=>CreateUser::class,
            self::TOPIC_CREATED=>TopicCreated::class,
            self::FORGET_PASSWORD=>ForgetPassword::class
        ];

        return $mails[$type];
       } catch (\Throwable $th) {
          throw new InvalidArgumentException('mailabel class dose not exist');
       }
    }
}
