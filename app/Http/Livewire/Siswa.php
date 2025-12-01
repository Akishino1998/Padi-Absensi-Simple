<?php

namespace App\Http\Livewire;

use App\Models\Kelas;
use App\Models\KelasSiswa;
use App\Models\Siswa as ModelsSiswa;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Siswa extends Component
{
    public $nama, $email, $idKelas;
    function tambahSiswaBaru(){
        $request = $this->validate([
            'nama' => 'required',
            'email' => 'required|unique:users',
        ]);
        
        $user = new User;
        $user->email = $this->email;
        $user->id_role = 4;
        $user->name = $this->nama;
        $user->password = Hash::make(12345678);
        $user->save();

        $siswa = new ModelsSiswa;
        $siswa->nama_siswa = $this->nama;
        $siswa->id_user = $user->id;
        $siswa->id_kelas = $this->idKelas;
        $siswa->save();

        $this->email = "";
        $this->nama = "";
        $this->idKelas = "";
    }
    public function render()
    {
        $siswa = ModelsSiswa::get();
        $kelas = Kelas::get();
        return view('livewire.siswa',compact('siswa','kelas'));
    }
}
