<?php

namespace App\Jobs;

use App\Services\Notification\Notification;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendSms implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $user;
    private $message;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user,$message)
    {
        $this->user=$user;
        $this->message=$message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Notification $notification)
    {
        return $notification->sendSms($this->user,$this->message);
    }
}
