<div>
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <strong><i class="fas fa-book-open    "></i> Riwayat Pembelajaran </strong>
            </div>
            <div class="card-option float-right">
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambahKelas"><i class="fas fa-book"></i> Laporan Absensi</button>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-sm table-striped table-hover " id="servisan-table" wire:ignore.self="">
                <tbody>
                    @foreach ($pelajaran as $item)
                    <tr class="mb-3">
                        <td class="pl-4">
                            <strong>{{ $item->nama_pelajaran }}</strong> <p class="text-muted" style="margin-bottom:0px !important"> </p>
                            <p class="text-muted" style="margin-bottom:0px !important"><i class="fas fa-home    "></i> {{ $item->Kelas->nama_kelas }} | Mulai : <i class="fa fa-calendar" aria-hidden="true"></i> {{ date("H:i - d F Y", strtotime($item->mulai))  }}  | Selesai : <i class="fa fa-calendar" aria-hidden="true"></i> {{ date("H:i - d F Y", strtotime($item->selesai))  }}</p>
                        </td>
                        <td style="text-align: center; vertical-align: inherit;">
                            <button class="btn btn-primary btn-info btn-sm" data-toggle="modal" data-target="#modalShowRiwayatPelajaran" wire:click="showPelajaran({{ $item->id }})"><i class="fas fa-list"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if (COUNT($pelajaran)==0)
            <div class="alert alert-success text-center" role="alert">
                <span class="text-bold text-lg">Belum Ada Pelajaran</span>
            </div>
            @endif
        </div>
    </div>
    <div class="modal fade" id="modalShowRiwayatPelajaran" wire:ignore.self>
        <div class="modal-dialog modal-lg" wire:ignore.self>
            <div class="modal-content" wire:ignore.self>
                <div class="modal-header">
                    <h4 class="modal-title">Kehadiran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if (!empty($selectPelajaran))
                        <div class="row">
                            <div class="card col-12">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-12">
                                            <!-- small card -->
                                            <div class="small-box bg-secondary">
                                              <div class="inner">
                                                <h3>{{ $selectPelajaran->Absensi->COUNT() }}</h3>
                                                <p>Jumlah Murid</p>
                                              </div>
                                              <div class="icon">
                                                <i class="fas fa-users"></i>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <!-- small card -->
                                            <div class="small-box bg-success">
                                              <div class="inner">
                                                <h3>{{ $selectPelajaran->Absensi->where('status','1')->COUNT() }}</h3>
                                                <p>Hadir</p>
                                              </div>
                                              <div class="icon">
                                                <i class="fas fa-user-check"></i>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <!-- small card -->
                                            <div class="small-box bg-danger">
                                              <div class="inner">
                                                <h3>{{ $selectPelajaran->Absensi->where('status','2')->COUNT() }}</h3>
                                                <p>Tidak Hadir</p>
                                              </div>
                                              <div class="icon">
                                                <i class="fas fa-user-times"></i>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="table-responsive">
                                        <table class="table table-hover align-middle mb-0" id="studentTable">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama</th>
                                                    <th style="text-align: center">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($selectPelajaran->Absensi as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->Siswa->nama_siswa }}</td>
                                                        <td style="text-align: center">
                                                            <div class="btn-group">
                                                                @if ($item->status == 1)
                                                                    <button type="button" class="btn btn-success">
                                                                        <i class="fas fa-user-check"></i> Hadir
                                                                    </button>
                                                                @else
                                                                    <button type="button" class="btn btn-danger">
                                                                        <i class="fas fa-user-times"></i> Tidak Hadir
                                                                    </button>
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @if (COUNT($selectPelajaran->Absensi)==0)
                                            <div class="alert alert-success text-center" role="alert">
                                                <span class="text-bold text-lg">Tidak Ada Siswa Terdaftar!</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="closeModalPelajaran" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
