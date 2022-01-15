<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\User;

class ShowTotal extends Component
{
    public $militancies;
    public $members;
    public $afiliates;
    public $friends;

    public $militanciesLoc;
    public $membersLoc;
    public $afiliatesLoc;
    public $friendsLoc;

    public $militanciesExt;
    public $membersExt;
    public $afiliatesExt;
    public $friendsExt;

    public function render()
    {
        $this->militancies = User::all()->count();
        $this->members = User::where('rol_id',1)->count();
        $this->afiliates = User::where('rol_id',2)->count();
        $this->friends = User::where('rol_id',3)->count();

        $this->militanciesLoc = User::where('is_local',1)->count();
        $this->membersLoc = User::where('rol_id',1)->where('is_local',1)->count();
        $this->afiliatesLoc = User::where('rol_id',2)->where('is_local',1)->count();
        $this->friendsLoc = User::where('rol_id',3)->where('is_local',1)->count();

        $this->militanciesExt = User::where('is_local',0)->count();
        $this->membersExt = User::where('rol_id',1)->where('is_local',0)->count();
        $this->afiliatesExt = User::where('rol_id',2)->where('is_local',0)->count();
        $this->friendsExt = User::where('rol_id',3)->where('is_local',0)->count();

        return view('livewire.dashboard.show-total');
    }
}
