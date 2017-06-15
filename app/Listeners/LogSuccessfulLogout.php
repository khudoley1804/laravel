<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use App\Models\History;
use Carbon\Carbon;


class LogSuccessfulLogout
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
     * @param  Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        $user_id = auth()->user()->id;
        $time = Carbon::now();
        $history = History::where('user_id', $user_id)->latest('logged_at')->first();
        $history->state = 'logged_out';
        $history->logged_out_at = $time;
        $history->update();
    }
}
