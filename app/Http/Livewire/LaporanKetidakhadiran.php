<?php

namespace App\Http\Livewire;

use App\Models\PelajaranKehadiran;
use Livewire\Component;

class LaporanKetidakhadiran extends Component
{
    public $time_start;
    public $time_end;
    public function set_date($time_start,$time_end){
        $this->time_start = date("Y-m-d 00:00:00", strtotime($time_start));;
        $this->time_end = date("Y-m-d 23:59:59", strtotime($time_end));
    }
    public function mount(){
        $this->time_start = date("Y-m-d 00:00:00", strtotime(NOW()));
        $this->time_end = date("Y-m-d 23:59:59", strtotime(NOW()));
    }
    public $pelajaranKehadiran;
    function showIsiKeteranganAbsen($idPelajaranKehadiran){
        $this->pelajaranKehadiran = PelajaranKehadiran::find($idPelajaranKehadiran);
    }
    public $keterangan;
    function isiKeteranganKetidakHadiran(){
        $this->pelajaranKehadiran->keterangan = $this->keterangan;
        $this->id_petugas = auth()->user()->id;
        $this->pelajaranKehadiran->save();
        $this->keterangan = "";
        $this->showIsiKeteranganAbsen($this->pelajaranKehadiran->id);
    }
    public function render()
    {
        $absensi = PelajaranKehadiran::latest()->whereBetween('created_at',[$this->time_start,$this->time_end])->where('status',2)->where('keterangan',"==",'null')->get();
        return view('livewire.laporan-ketidakhadiran',compact('absensi'));
    }
}
