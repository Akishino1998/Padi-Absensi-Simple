<?php

namespace App\Http\Livewire;

use App\Models\KelasGuru;
use App\Models\Pelajaran as ModelsPelajaran;
use App\Models\PelajaranKehadiran;
use App\Models\Siswa;
use Livewire\Component;

class Pelajaran extends Component
{
    public $id_kelas, $nama_pelajaran, $deskripsi;
    public function tambahPelajaranBaru(){
        $pelajaran = new ModelsPelajaran;
        $pelajaran->id_guru = auth()->user()->Guru->id;
        $pelajaran->id_kelas = $this->id_kelas;
        $pelajaran->nama_pelajaran = $this->nama_pelajaran;
        $pelajaran->deskripsi = $this->deskripsi;
        $pelajaran->mulai = now();
        $pelajaran->save();

        $this->id_kelas = "";
        $this->nama_pelajaran = "";
        $this->deskripsi = "";
    }
    public $selectPelajaran;
    function showPelajaran($id){
        $this->selectPelajaran = ModelsPelajaran::find($id);
    }
    function absensiPelajaran($idSiswa, $status){
        $kehadiran = PelajaranKehadiran::where('id_siswa',$idSiswa)->where('id_pelajaran',$this->selectPelajaran->id)->get();
        if ($kehadiran->COUNT() == 0) {
            $kehadiran = new PelajaranKehadiran;
            $kehadiran->id_siswa = $idSiswa;
            $kehadiran->id_pelajaran = $this->selectPelajaran->id;
            $kehadiran->status = $status;
            $kehadiran->save();
        }else{
            $kehadiran = $kehadiran->first();
            $kehadiran->delete();
        }
        $this->showPelajaran($this->selectPelajaran->id);
    }
    function pelajaranBerakhir(){
        $pelajaran = $this->selectPelajaran;
        $pelajaran->selesai = now();
        $pelajaran->save();
        foreach (Siswa::where('id_kelas',$pelajaran->id_kelas)->get() as $item) {
            if ($pelajaran->Absensi->where('id_siswa',$item->id)->COUNT()==0) {
                $kehadiran = new PelajaranKehadiran;
                $kehadiran->id_siswa = $item->id;
                $kehadiran->id_pelajaran = $this->selectPelajaran->id;
                $kehadiran->status = 2;
                $kehadiran->save();
            }
        }
        session()->flash('message', 'selesai');
        $this->showPelajaran($this->selectPelajaran->id);
    }
    public function render()
    {
        $pelajaran = ModelsPelajaran::where('id_guru',auth()->user()->Guru->id)->where('selesai',null)->get();
        $kelas = KelasGuru::where('id_guru',auth()->user()->Guru->id)->get();
        $siswa = Siswa::get();
        return view('livewire.pelajaran',compact('pelajaran','kelas','siswa'));
    }
}
