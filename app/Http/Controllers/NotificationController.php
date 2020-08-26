<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendEmailRequest;
use App\Http\Requests\SendSmsRequest;
use App\Jobs\SendEmail;
use App\Jobs\SendSms;
use App\Services\Notification\Constants\Constants;
use App\User;


class NotificationController extends Controller
{
    public function home()
    {
        $users = User::all();
        $emailTypes = Constants::toString();
        return view('notifications.email.index', compact('users', 'emailTypes'));
    }

    public function sendEmail(SendEmailRequest $request)
    {
        try {
            $mailable = Constants::toMail($request->type);
            SendEmail::dispatch(User::find($request->user), new $mailable);
            return redirect()->back()->with('success', __('message.success'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('feild', __('message.feild'));
        }
    }

    public function smsFrom()
    {
        $users = User::all();
        return view('notifications.sms.index', compact('users'));
    }

    public function sendSms(SendSmsRequest $request)
    {
        try {
            SendSms::dispatch(User::find($request->user), $request->message);
            return redirect()->back()->with('success', __('message.success'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('feild', __('message.feild'));
        }
    }
}
