<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Siswa as LivewireSiswa;
use App\Models\Guru;
use App\Models\Kelas as ModelsKelas;
use App\Models\KelasGuru;
use App\Models\KelasSiswa;
use App\Models\Siswa;
use Livewire\Component;
use PDO;

class Kelas extends Component
{
    public $guru_kelas=[], $nama_kelas;
    function tambahKelasBaru(){
        $request = $this->validate([
            'nama_kelas' => 'required',
        ]);

        $kelas = new ModelsKelas;
        $kelas->nama_kelas = $this->nama_kelas;
        $kelas->save();
        foreach ($this->guru_kelas as $item) {
            $guru_kelas = new KelasGuru;
            $guru_kelas->id_kelas = $kelas->id;
            $guru_kelas->id_guru = $item;
            $guru_kelas->save();
        }
        $this->nama_kelas = "";
        $this->guru_kelas = [];
    }
    public $dataKelas, $dataSiswa, $dataGuru;
    function showKelas($id){
        $this->dataKelas = ModelsKelas::find($id);
        $this->kelasEdit = $this->dataKelas->nama_kelas;
    }
    public $kelasEdit;
    function editKelas(){
        $kelas = $this->dataKelas;
        $kelas->nama_kelas = $this->kelasEdit;
        $kelas->save();
    }
    function tambahGuruPengampu($id){
        $guruKelas = new KelasGuru;
        $guruKelas->id_kelas = $this->dataKelas->id;
        $guruKelas->id_guru = $id;
        $guruKelas->save();
        $this->dataKelas = ModelsKelas::find($this->dataKelas->id);
    }
    function removeGuruPengampu($id){
        $guruKelas = KelasGuru::find($id);
        $guruKelas->delete();
        $this->dataKelas = ModelsKelas::find($this->dataKelas->id);
    }
    function tambahSiswaKelas($id){
        $siswa = Siswa::find($id);
        $siswa->id_kelas = $this->dataKelas->id;
        $siswa->save();
        $this->dataKelas = ModelsKelas::find($this->dataKelas->id);
    }
    function removeSiswaKelas($id){
        $siswa = Siswa::find($id);
        $siswa->id_kelas = null;
        $siswa->save();
        $this->dataKelas = ModelsKelas::find($this->dataKelas->id);
    }
    public function render()
    {
        $kelas = ModelsKelas::get();
        $siswa = Siswa::get();
        $guru = Guru::get();
        return view('livewire.kelas',compact('kelas','guru','siswa'));
    }
}
