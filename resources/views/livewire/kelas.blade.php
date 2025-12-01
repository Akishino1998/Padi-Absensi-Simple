<div>
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <strong><i class="fas fa-home mr-1"></i> Daftar Kelas</strong>
            </div>
            <div class="card-option float-right">
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambahKelas"><i
                        class="fa fa-plus" aria-hidden="true"></i> Tambah Kelas</button>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-sm table-striped table-hover " id="servisan-table" wire:ignore.self="">
                <tbody>
                    @foreach ($kelas as $item)
                    <tr class="mb-3">
                        <td class="pl-4">
                            <strong>{{ $item->nama_kelas }}</strong>
                            <p class="text-muted" style="margin-bottom:0px !important">Jumlah Guru :  {{ $item->Guru->COUNT() }} | Jumlah Siswa : {{ $siswa->where('id_kelas',$item->id)->COUNT() }} </p>
                        </td>
                        <td style="text-align: center; vertical-align: inherit;">
                            <button class="btn btn-primary btn-info btn-sm" data-toggle="modal" data-target="#modalShowKelas" wire:click="showKelas({{ $item->id }})"><i class="far fa-file-alt"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if (COUNT($kelas)==0)
            <div class="alert alert-success text-center" role="alert">
                <span class="text-bold text-lg">Tidak Kelas</span>
            </div>
            @endif
        </div>
    </div>
    <div class="modal fade" id="modalTambahKelas" wire:ignore.self>
        <div class="modal-dialog" wire:ignore.self>
            <div class="modal-content" wire:ignore.self>
                <form wire:submit.prevent="tambahKelasBaru">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Kelas Baru</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group col-sm-12">
                            <label for="nama">Nama kelas <span class="badge bg-primary">Wajib</span></label>
                            <input class="form-control @error('nama_kelas') is-invalid @enderror"
                                wire:model="nama_kelas" type="text" id="nama_kelas" autocomplete="off">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" id="closeModalKelas"
                            data-dismiss="modal">Close</button>
                        <div wire:loading.remove wire:target="tambahKelasBaru">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Simpan</button>
                        </div>
                        <div wire:loading wire:target="tambahKelasBaru">
                            <button class="btn btn-primary"><i class="fas fa-circle-notch fa-spin"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalShowKelas" wire:ignore.self>
        <div class="modal-dialog modal-lg " wire:ignore.self>
            <div class="modal-content" wire:ignore.self>
                <div class="modal-header">
                    <h4 class="modal-title">Informasi Kelas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if (!empty($dataKelas))
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h1 class="h3 mb-0">Kelas: <span id="className">{{ $dataKelas->nama_kelas }}</span></h1>
                            </div>
                            <div>
                                <button class="btn btn-primary me-2 btn-sm" data-toggle="modal" data-target="#editKelasModal"><i class="fas fa-home    "></i> Edit Kelas</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card card-info card-outline">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <strong>Guru Pengampu </strong>
                                        </div>
                                        <div class="card-options float-right">
                                            <div class="d-flex">
                                                <button class="btn btn-primary btn-sm ml-2" data-toggle="modal" data-target="#modalGuruBaru"><i class="fa fa-user-graduate " aria-hidden="true"></i> Tambah Guru</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group" id="teacherList">
                                            @foreach ($dataKelas->Guru as $item)
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div>
                                                        <div class="fw-bold">{{ $item->Guru->nama_guru }}</div>
                                                    </div>
                                                    <div>
                                                        <span class="btn btn-sm btn-outline-danger btn-remove-teacher"  wire:click="removeGuruPengampu({{ $item->id }})"><i class="fas fa-trash    "></i></button>
                                                    </div>
                                                </li>
                                            @endforeach
                                            @if (COUNT($dataKelas->Guru)==0)
                                                <div class="alert alert-success text-center" role="alert">
                                                    <span class="text-bold text-lg">Tidak Ada Guru Terdaftar!</span>
                                                </div>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card card-info card-outline">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <strong>Daftar Siswa <span class="badge bg-secondary" id="studentCount">{{ COUNT($siswa->where('id_kelas',$dataKelas->id)) }}</span></strong>
                                        </div>
                                        <div class="card-options float-right">
                                            <div class="d-flex">
                                                <input id="searchStudent" class="form-control form-control-sm me-2" placeholder="Cari siswa...">
                                                <button class="btn btn-primary btn-sm ml-2" data-toggle="modal" data-target="#modalSiswaBaru"><i class="fa fa-user-plus" aria-hidden="true"></i> </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover align-middle mb-0" id="studentTable">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nama</th>
                                                        <th>NIS</th>
                                                        <th>Jenis Kelamin</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($siswa->where('id_kelas',$dataKelas->id) as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->nama_siswa }}</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>
                                                                <span class="btn btn-sm btn-outline-danger" wire:click="removeSiswaKelas({{ $item->id }})"><i class="fas fa-trash    "></i></span>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            @if (COUNT($siswa->where('id_kelas',$dataKelas->id))==0)
                                                <div class="alert alert-success text-center" role="alert">
                                                    <span class="text-bold text-lg">Tidak Ada Siswa Terdaftar!</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="closeModalKelas" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editKelasModal" wire:ignore.self>
        <div class="modal-dialog" wire:ignore.self>
            <div class="modal-content" wire:ignore.self>
                <form wire:submit.prevent="editKelas">
                    <div class="modal-header">
                        <h4 class="modal-title">Ubah Nama Kelas</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group col-sm-12">
                            <label for="nama">Nama <span class="badge bg-primary">Wajib</span></label>
                            <input class="form-control @error('nama_kelas') is-invalid @enderror"
                                wire:model="kelasEdit" type="text" id="nama_kelas" autocomplete="off">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" id="closeEditModalKelas"
                            data-dismiss="modal">Close</button>
                        <div wire:loading.remove wire:target="editKelas">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Simpan</button>
                        </div>
                        <div wire:loading wire:target="editKelas">
                            <button class="btn btn-primary"><i class="fas fa-circle-notch fa-spin"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalGuruBaru" wire:ignore.self>
        <div class="modal-dialog" wire:ignore.self>
            <div class="modal-content" wire:ignore.self>
                <form wire:submit.prevent="tambahGuruPengampu">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Guru Pengampu</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @if (!empty($dataKelas))
                            <div class="form-group col-sm-12">
                                <ul class="list-group" id="teacherList">
                                    @foreach ($guru as $item)
                                        <li class="list-group-item d-flex justify-content-between align-items-start">
                                            <div>
                                                <div class="fw-bold">{{ $item->nama_guru }}</div>
                                            </div>
                                            <div>
                                                @if ($item->GuruKelas->where('id_kelas',$dataKelas->id)->COUNT())
                                                    <span class="btn btn-sm btn-outline-danger" wire:click="removeGuruPengampu({{ $item->GuruKelas->where('id_kelas',$dataKelas->id)->first()->id }})"><i class="fas fa-trash    "></i></span>
                                                @else
                                                    <span class="btn btn-sm btn-outline-primary" wire:click="tambahGuruPengampu({{ $item->id }})"><i class="fas fa-plus    "></i></span>
                                                @endif
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" id="closeTambahGuruPengampu" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalSiswaBaru" wire:ignore.self>
        <div class="modal-dialog modal-lg" wire:ignore.self>
            <div class="modal-content" wire:ignore.self>
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Siswa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if (!empty($dataKelas))
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0" id="studentTable">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>NIS</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($siswa->where('id_kelas',null) as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama_siswa }}</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>
                                                <span class="btn btn-sm btn-outline-primary" wire:click="tambahSiswaKelas({{ $item->id }})"><i class="fas fa-plus    "></i></span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @if (COUNT($siswa->where('id_kelas',null))==0)
                                <div class="alert alert-success text-center" role="alert">
                                    <span class="text-bold text-lg">Tidak Ada Siswa Terdaftar!</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="closeTambahGuruPengampu" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
