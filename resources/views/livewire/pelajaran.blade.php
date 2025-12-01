<div>
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <strong><i class="fas fa-book-open    "></i> Pelajaran Berlangsung</strong>
            </div>
            <div class="card-option float-right">
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambahKelas"><i class="fa fa-plus" aria-hidden="true"></i> Buat Pembelajaran</button>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-sm table-striped table-hover " id="servisan-table" wire:ignore.self="">
                <tbody>
                    @foreach ($pelajaran as $item)
                    <tr class="mb-3">
                        <td class="pl-4">
                            <strong>{{ $item->nama_pelajaran }}</strong> <p class="text-muted" style="margin-bottom:0px !important"> </p>
                            <p class="text-muted" style="margin-bottom:0px !important"><i class="fas fa-home    "></i> {{ $item->Kelas->nama_kelas }} | <i class="fa fa-calendar" aria-hidden="true"></i> {{ date("H:i - d F Y", strtotime($item->mulai))  }}</p>
                        </td>
                        <td style="text-align: center; vertical-align: inherit;">
                            <button class="btn btn-primary btn-info btn-sm" data-toggle="modal" data-target="#modalShowPelajaran" wire:click="showPelajaran({{ $item->id }})"><i class="fas fa-list"></i></button>
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
    <div class="modal fade" id="modalTambahKelas" wire:ignore.self>
        <div class="modal-dialog" wire:ignore.self>
            <div class="modal-content" wire:ignore.self>
                <form wire:submit.prevent="tambahPelajaranBaru">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Pelajaran Baru</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group col-sm-12">
                            <label for="nama">Nama Pelajaran <span class="badge bg-primary">Wajib</span></label>
                            <input class="form-control @error('nama_pelajaran') is-invalid @enderror" wire:model="nama_pelajaran" type="text" id="nama_pelajaran" autocomplete="off">
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="nama">Deskripsi <span class="badge bg-primary">Wajib</span></label>
                            <input class="form-control @error('deskripsi') is-invalid @enderror" wire:model="deskripsi" type="text" id="deskripsi" autocomplete="off">
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="selectClass" class="form-label">Pilih Kelas</label>
                            <select id="selectClass" class="form-control" wire:model="id_kelas">
                              <option value="" selected >Pilih kelas...</option>
                              @foreach ($kelas as $item)
                                <option value="{{ $item->id_kelas }}">{{ $item->Kelas->nama_kelas }}</option>
                              @endforeach
                            </select>
                          </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" id="closeModalKelas"
                            data-dismiss="modal">Close</button>
                        <div wire:loading.remove wire:target="tambahPelajaranBaru">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Simpan</button>
                        </div>
                        <div wire:loading wire:target="tambahPelajaranBaru">
                            <button class="btn btn-primary"><i class="fas fa-circle-notch fa-spin"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalShowPelajaran" wire:ignore.self>
        <div class="modal-dialog modal-lg" wire:ignore.self>
            <div class="modal-content" wire:ignore.self>
                <div class="modal-header">
                    <h4 class="modal-title">Tandai Kehadiran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if (!empty($selectPelajaran))
                        <div class="row">
                            <button class="btn btn-warning mb-2" style="width: 100%" data-toggle="modal" data-target="#modalShowKonfirmasiPelajaran" ><i class="fas fa-book"></i> Selesaikan Pelajaran</button>
                            <div class="card col-12">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-12">
                                            <!-- small card -->
                                            <div class="small-box bg-secondary">
                                              <div class="inner">
                                                <h3>{{ $siswa->where('id_kelas',$selectPelajaran->id_kelas)->COUNT() }}</h3>
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
                                                    <th style="text-align: center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($siswa->where('id_kelas',$selectPelajaran->id_kelas) as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->nama_siswa }}</td>
                                                        <td style="text-align: right">
                                                            <div class="btn-group">
                                                                @if (COUNT($item->checkAbsensi($item->id,$selectPelajaran->id))==0)
                                                                    <button type="button" class="btn btn-success" wire:click="absensiPelajaran({{ $item->id }},1)">
                                                                        <i class="fas fa-user-check"></i>
                                                                    </button>
                                                                    <button type="button" class="btn btn-danger" wire:click="absensiPelajaran({{ $item->id }},2)">
                                                                        <i class="fas fa-user-times"></i>
                                                                    </button>
                                                                @else
                                                                    @if ($item->checkAbsensi($item->id,$selectPelajaran->id)->first()->status == 1)
                                                                        <button type="button" class="btn btn-success" wire:click="absensiPelajaran({{ $item->id }},0)">
                                                                            <i class="fas fa-user-check"></i> Hadir
                                                                        </button>
                                                                    @else
                                                                        <button type="button" class="btn btn-danger" wire:click="absensiPelajaran({{ $item->id }},0)">
                                                                            <i class="fas fa-user-times"></i> Tidak Hadir
                                                                        </button>
                                                                    @endif
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @if (COUNT($siswa->where('id_kelas',$selectPelajaran->id_kelas))==0)
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
    <div class="modal fade" id="modalShowKonfirmasiPelajaran" wire:ignore.self>
        <div class="modal-dialog" wire:ignore.self>
            <div class="modal-content" wire:ignore.self>
                <form wire:submit.prevent="pelajaranBerakhir">
                    <div class="modal-header">
                        <h4 class="modal-title">Konfirmasi mengakhiri pelajaran</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="callout callout-warning">
                            <h5> Pastikan semua kehadiran murid sudah benar dan sesuai!</h5>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" id="closeModalKonfirmasiPelajaran" data-dismiss="modal">Close</button>
                        <div wire:loading.remove wire:target="pelajaranBerakhir">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Akhiri</button>
                        </div>
                        <div wire:loading wire:target="pelajaranBerakhir">
                            <button class="btn btn-primary"><i class="fas fa-circle-notch fa-spin"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div wire:poll.500ms>
        @if (session()->has('message'))
            <script>
                $('#closeModalKonfirmasiPelajaran').click(); 
                $('#closeModalPelajaran').click(); 
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil disimpan!',
                });
            </script>
        @endif
    </div>
</div>
