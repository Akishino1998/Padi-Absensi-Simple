@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endsection
<div>
    <div class="col-12">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card card-info card-outline">
                    <div class="card-header border-0">
                        <strong>Status Ketidakhadiran</strong>
                    </div>
                    <div class="card-body row">
                        <div class="col-md-6 col-sm-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-info"><i class="fas fa-home"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text"><strong>Siswa Tidak Hadir</strong></span>
                                    <span class="info-box-number">{{ COUNT($absensi) }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-warning"><i class="fas fa-users"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text"><strong>Sudah Melapor</strong></span>
                                    <span class="info-box-number">{{ COUNT($absensi) }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="col-xl-3 col-md-3 col-sm-12 mb-2">
                                <input type="hidden" name="time_start" id="time_start" wire:model="time_start">
                                <input type="hidden" name="time_end" id="time_end" wire:model="time_end">
                                <label for="dates" class="form-label">Atur Tanggal</label>
                                <input id="date_range" class="datepicker-here form-control digits" autocomplete="off" readonly required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Siswa</th>
                                            <th>Kelas</th>
                                            <th>Nama Ustadz</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Tanggal Tidak Hadir</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($absensi as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->Siswa->nama_siswa }}</td>
                                                <td>{{ $item->Pelajaran->Kelas->nama_kelas }}</td>
                                                <td>{{ $item->Pelajaran->Guru->nama_guru }}</td>
                                                <td>{{ $item->Pelajaran->nama_pelajaran }}</td>
                                                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}</td>
                                                <td>
                                                    <button class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#showIsiKeteranganAbsen" wire:click="showIsiKeteranganAbsen({{ $item->id }})">
                                                        Isi Keterangan
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @if (COUNT($absensi) == 0)
                                    <div class="alert alert-success text-center" role="alert">
                                        <span class="text-bold text-lg">Tidak Ada Data Ketidakhadiran Siswa</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="showIsiKeteranganAbsen" wire:ignore.self>
            <div class="modal-dialog modal-lg" wire:ignore.self>
                <div class="modal-content" wire:ignore.self>
                    <form wire:submit.prevent="isiKeteranganKetidakHadiran">
                        <div class="modal-header">
                            <h4 class="modal-title">Keterangan ketidakhadiran</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @if (!empty($pelajaranKehadiran))
                                @if ($pelajaranKehadiran->id_petugas != null)
                                    <div class="alert alert-info">
                                        <strong>Info!</strong> Keterangan tidak hadir sudah diisi dengan keterangan : <br>
                                        <strong>{{ $pelajaranKehadiran->keterangan }}</strong> <br>
                                        <i>Dicekkan oleh {{ $pelajaranKehadiran->DiCekOleh->name }} pada {{ \Carbon\Carbon::parse($pelajaranKehadiran->updated_at)->format('d F Y H:i') }}.</i>
                                    </div>
                                @else
                                    <div class="alert alert-warning">
                                        <strong>Perhatian!</strong> Keterangan tidak hadir belum diisi.
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label>Keterangan Tidak Hadir</label>
                                    <textarea class="form-control" rows="3" placeholder="..." wire:model="keterangan"></textarea>
                                </div>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" id="closeModalKonfirmasiPelajaran" data-dismiss="modal">Close</button>
                            <div wire:loading.remove wire:target="isiKeteranganKetidakHadiran">
                                <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Akhiri</button>
                            </div>
                            <div wire:loading wire:target="isiKeteranganKetidakHadiran">
                                <button class="btn btn-primary"><i class="fas fa-circle-notch fa-spin"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @section('js')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        $('#date_range').daterangepicker({
            locale: {
                format: 'DD MMMM YYYY'
            }
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            $("#time_start").val(start.format('YYYY-MM-DD'));
            $("#time_end").val(end.format('YYYY-MM-DD'));
            @this.call('set_date',start.format('YYYY-MM-DD'),end.format('YYYY-MM-DD'))
        });
    </script>
    @endsection
</div>
