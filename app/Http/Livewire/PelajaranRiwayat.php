<?php

namespace App\Http\Livewire;

use App\Models\Pelajaran;
use Livewire\Component;

class PelajaranRiwayat extends Component
{
    public $selectPelajaran;
    function showPelajaran($id){
        $this->selectPelajaran = Pelajaran::find($id);
    }
    public function render()
    {
        $pelajaran = Pelajaran::latest()->where('id_guru',auth()->user()->Guru->id)->where('selesai','!=',null)->get();
        return view('livewire.pelajaran-riwayat',compact('pelajaran'));
    }

}
