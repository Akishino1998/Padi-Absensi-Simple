<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index(){
        $kelas = Kelas::get();
        $guru = Guru::get();
        $siswa = Siswa::get();
        return view('dashboard',compact('kelas','guru','siswa'));
    }
}
