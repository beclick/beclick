<?php


namespace App\helpers;


use App\Mail\MailMessage;
use App\Models\Message;
use App\Models\Profile;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class appHelper
{
    public static function mailer()
    {
        $messages = Message::where('mail', 0)->get();
        foreach ($messages as $message) {
            $profile = Profile::where('id', $message->profile_id)->first();

            if (isset($profile->user->email)) {
                Mail::to($profile->user->email)->send(new MailMessage($message->subject, $message->message));
                if (!count(Mail::failures())) {
                    $message->mail = 1;
                    $message->save();
                }
            }
        }
    }
}
