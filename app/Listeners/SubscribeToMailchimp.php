<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SubscribeToMailchimp
{
    private $mailchimp;
    public function __construct(\Mailchimp $mailchimp){
        $this->mailchimp = $mailchimp;
    }
    public function handle(UserRegistered $event)
    {
        $this->mailchimp->lists->subscribe(
            env('MAILCHIMP_LIST_ID'),
            ['email' => $event->user->email],
            // ['email' => 'ab.pk012@gmail.com'],
            null,
            null,
            false
        );
    }
}
