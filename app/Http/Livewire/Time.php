<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Time extends Component
{
    function setOnline(){
        $user = User::find(auth()->user()->id);
        $user->last_online = now();
        $user->save();
    }
    public function render()
    {
        $cookie = (isset($_COOKIE['offset']))?$_COOKIE['offset']:"";
        return view('livewire.time',compact('cookie'));
    }
}
