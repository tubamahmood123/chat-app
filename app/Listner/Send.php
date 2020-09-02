<?php

namespace App\Listner;
use Mail;
use App\Events\UserRegister;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Send
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserRegister  $event
     * @return void
     */
    public function handle(UserRegister $event)
    {
        $user = $event->User;
        Mail::send('emails.mail', ['user' => $user], function ($message) use ($user) {
                $message->from('tubamahmood2@gmail.com');
                $message->subject('Welcome aboard '.$user->name.'!');
                $message->to($user->email);

        });
    }
}
