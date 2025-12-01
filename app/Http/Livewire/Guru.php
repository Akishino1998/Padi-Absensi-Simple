<?php

namespace App\Http\Livewire;

use App\Models\Guru as ModelsGuru;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Guru extends Component
{   
    public $nama, $email;
    function tambahGuruBaru(){
        $request = $this->validate([
            'nama' => 'required',
            'email' => 'required',
        ]);
        
        $user = new User;
        $user->email = $this->email;
        $user->id_role = 3;
        $user->name = $this->nama;
        $user->password = Hash::make(12345678);
        $user->save();

        $guru = new ModelsGuru;
        $guru->nama_guru = $this->nama;
        $guru->id_user = $user->id;
        $guru->save();

        $this->email = "";
        $this->nama = "";
    }
    public function render()
    {
        $guru = ModelsGuru::get();
        return view('livewire.guru',compact('guru'));
    }
}
