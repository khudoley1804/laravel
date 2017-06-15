<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Attempting;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\History;

class LogAuthenticationAttempt
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
     * @param  Attempting  $event
     * @return void
     */
    public function handle(Attempting $event)
    {
        $email = $event->credentials['email'];
        $user = User::where('email', $email)->first();
        $user_id = $user->id;
        
        $history = History::where('user_id', $user_id)->latest('logged_at')->first();
        if ($history['ip'] === '127.0.0.1' && $history['state'] === 'logged_in') {
            dd('error');
            //return redirect('/login');
        }
    }
}
