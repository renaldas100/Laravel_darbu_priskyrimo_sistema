<?php

namespace App\Listeners;

use App\Events\AddTask;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class InformUserNewTask
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(AddTask $event): void
    {
//        dd($event->task);
//        dd($event->user);
        Mail::send('email.task',[
            'task'=>$event->task,
            'user'=>$event->user,
        ],function ($message){
            $message->to("renaldas0119@gmail.com")->subject("Sukurta nauja užduotis")->from("bit@poligonas.lt");
        });
    }
}
