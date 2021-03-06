<?php

namespace Zeropingheroes\Lanager\Listeners;

use Illuminate\Auth\Events\Login;
use Zeropingheroes\Lanager\Lan;
use Zeropingheroes\Lanager\Attendee;

class UpdateLanAttendeesTable
{

    /**
     * Handle the event.
     *
     * @param Login $login
     * @return void
     * @internal param object $event
     */
    public function handle(Login $login)
    {
        $lanHappeningNow = Lan::where('start', '<', now())
            ->where('end', '>', now())->first();

        if ($lanHappeningNow) {
            Attendee::firstOrCreate(
                [
                    'user_id' => $login->user->id,
                    'lan_id' => $lanHappeningNow->id,
                ]
            )->touch();
        }
    }
}
