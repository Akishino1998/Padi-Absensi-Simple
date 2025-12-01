<?php

namespace App\Http\Livewire;

use App\Models\Kelas;
use App\Models\KelasGuru;
use App\Models\Pelajaran;
use Livewire\Component;

class Laporan extends Component
{
    public $kelasGuru;
    public $time_start, $time_end;
    public function set_date($time_start,$time_end){
        $this->time_start =  date("Y-m-d 00:00:00", strtotime($time_start));
        $this->time_end = date("Y-m-d 23:59:59", strtotime($time_end));
    }
    function showAbsensi($idKelas){
        $this->kelasGuru = KelasGuru::find($idKelas);
    }
    public $pelajaranKelasSiswaSelected, $idSiswaSelected;
    function showPelajaranDetail($time_current, $idSiswaSelected){
        $this->pelajaranKelasSiswaSelected = Pelajaran::where('id_kelas',$this->kelasGuru->id_kelas)->where('id_guru',$this->kelasGuru->id_guru)->whereBetween('mulai',[date("Y-m-d 00:00:00", $time_current),date("Y-m-d 23:59:59", $time_current)])->where('selesai',"!=",null)->get();
        $this->idSiswaSelected = $idSiswaSelected;
    }
    public function mount(){
        $this->time_start = date("Y-m-01 00:00:00", strtotime(NOW()));
        $this->time_end =date("Y-m-t 23:59:59", strtotime(NOW()));
    }
    public function render()
    {
        $kelas = KelasGuru::where('id_guru',auth()->user()->Guru->id)->get();
        $pelajaran = new Pelajaran;
        return view('livewire.laporan',compact('kelas','pelajaran'));
    }
}
