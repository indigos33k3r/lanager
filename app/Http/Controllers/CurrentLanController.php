<?php

namespace Zeropingheroes\Lanager\Http\Controllers;

use Zeropingheroes\Lanager\Lan;

class CurrentLanController extends Controller
{
    /**
     * @var \Zeropingheroes\Lanager\Lan
     */
    protected $currentLan;

    /**
     * Determine the current LAN
     */
    public function __construct()
    {
        // Get the LAN happening now
        // or the most recently ended LAN
        $this->currentLan = Lan::presentAndPast()
            ->orderBy('start', 'desc')
            ->first();

        // If there isn't a LAN happening now
        // nor a LAN that has recently ended
        // get the nearest future LAN
        if (!$this->currentLan) {
            $this->currentLan = Lan::orderBy('start', 'asc')
                ->first();
        }

        // If there are no LANs, go to a 404 page
        if (!$this->currentLan) {
            abort(404);
        }
    }

    /**
     * Redirect to current LAN's page
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show()
    {
        return redirect()->route('lans.show', $this->currentLan);
    }

    /**
     * Redirect to current LAN's guides index
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function guides()
    {
        return redirect()->route('lans.guides.index', $this->currentLan);
    }

    /**
     * Redirect to current LAN's events index
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function events()
    {
        return redirect()->route('lans.events.index', $this->currentLan);
    }

    /**
     * Redirect to current LAN's events schedule
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function schedule()
    {
        return redirect()->route('lans.events.index', ['lan' => $this->currentLan, 'schedule']);
    }

    /**
     * Redirect to current LAN's attendees index
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function users()
    {
        return redirect()->route('lans.attendees.index', $this->currentLan);
    }

    /**
     * Redirect to current LAN's awarded achievements
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function userAchievements()
    {
        return redirect()->route('lans.user-achievements.index', $this->currentLan);
    }
}
