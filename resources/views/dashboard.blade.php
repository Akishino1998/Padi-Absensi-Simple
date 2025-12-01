@extends('layouts.app')

@section('content')
<section class="content pt-2 ">
    <div class="container-fluid">
        <div class="row">
            @if (auth()->user()->id_role == 2)
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-info card-outline">
                                <div class="card-header border-0">
                                    <strong>Status</strong>
                                </div>
                                <div class="card-body row">
                                    <div class="col-md-4 col-sm-12">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-info"><i class="fas fa-home"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text"><strong>Total Kelas</strong></span>
                                                <span class="info-box-number">{{ COUNT($kelas) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-warning"><i class="fas fa-users"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text"><strong>Total Siswa</strong></span>
                                                <span class="info-box-number">{{ COUNT($siswa) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-success"><i
                                                    class="fas fa-user-graduate"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text"><strong>Total Guru</strong></span>
                                                <span class="info-box-number">{{ COUNT($guru) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <livewire:kelas>
                </div>
                <div class="col-md-12 col-sm-12">
                    <livewire:guru>
                </div>
                <div class="col-md-12 col-sm-12">
                    <livewire:siswa>
                </div>
            @elseif (auth()->user()->id_role == 3)
                <div class="col-12 pt-5">
                    <div class="card card-primary card-outline card-outline-tabs" style="border-top:3px solid #007bff">
                        <div class="card-header p-0 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                                        href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home"
                                        aria-selected="true">Pelajaran</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                        href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile"
                                        aria-selected="false">Riwayat</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill"
                                        href="#custom-tabs-four-messages" role="tab"
                                        aria-controls="custom-tabs-four-messages" aria-selected="false">Absen</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-four-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                    <livewire:pelajaran>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                                    <livewire:pelajaran-riwayat>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                                    <livewire:laporan>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            @elseif (auth()->user()->id_role == 5)
                <div class="col-md-12 col-sm-12">
                    <livewire:laporan-ketidakhadiran>
                </div>
            @endif

        </div>
    </div>
    
</section>
@endsection
