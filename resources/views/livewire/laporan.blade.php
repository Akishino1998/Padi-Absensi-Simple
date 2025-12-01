@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <style>
        .daterangepicker td.in-range{
            background-color: #357ebd !important;
            color: white !important;
        }
        #attendanceContainer td{
            text-align: center; 
            vertical-align: middle;
        }
        #attendanceContainer th{
            text-align: center; 
            vertical-align: middle;
        }
        .tombolShowPelajaranDetail{
            cursor: pointer;
        }
        .tombolShowPelajaranDetail:hover{
            background-color: #f0f0f0;
        }
    </style>
@endsection
<div>
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <strong><i class="fas fa-book-open    "></i> Laporan Pembelajaran </strong>
            </div>
            <div class="card-option float-right">
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambahKelas"><i
                        class="fas fa-book"></i> Laporan Absensi</button>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-sm table-striped table-hover " wire:ignore.self="">
                <tbody>
                    @foreach ($kelas as $item)
                    <tr class="mb-3">
                        <td class="pl-4">
                            <strong><i class="fas fa-home"></i> Kelas : {{ $item->Kelas->nama_kelas }}</strong>
                            <p class="text-muted" style="margin-bottom:0px !important"> <i class="fas fa-book    "></i>
                                Jumlah Pertemuan :
                                {{ COUNT($pelajaran->where('id_kelas',$item->id_kelas)->where('id_guru',$item->id_guru)->where('selesai','!=',null)->get()) }}
                            </p>
                        </td>
                        <td style="text-align: center; vertical-align: inherit;">
                            <button class="btn btn-primary btn-info btn-sm" data-toggle="modal"
                                data-target="#showAbsensi" wire:click="showAbsensi({{ $item->id }})"><i
                                    class="far fa-file-alt"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if (COUNT($kelas)==0)
            <div class="alert alert-success text-center" role="alert">
                <span class="text-bold text-lg">Belum Ada Pelajaran</span>
            </div>
            @endif
        </div>
    </div>
    <div class="modal fade" id="showAbsensi" wire:ignore.self>
        <div class="modal-dialog modal-xl " wire:ignore.self>
            <div class="modal-content" wire:ignore.self>
                <div class="modal-header">
                    <h4 class="modal-title">Informasi Kehadiran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="card mb-4">
                            <div class="card-body row">
                                <div class="col-md-3">
                                    <label class="form-label">Pilih Bulan</label>
                                    <input id="date_range" class="datepicker-here form-control " autocomplete="off" readonly required style="font-size: 12px;">
                                </div>
                            </div>
                        </div>
                        @if (!empty($kelasGuru))
                            <div class="card">
                                <div class="card-body table-responsive" id="attendanceContainer">
                                    <table class="table table-bordered">
                                        <thead class="table-light">
                                            @php
                                                $time_current= strtotime($time_start);
                                                $i = 0
                                            @endphp
                                            @while ($time_current <= strtotime($time_end))
                                                @php
                                                    $time_current= strtotime("+1 day", $time_current);
                                                    $i++;
                                                @endphp
                                            @endwhile
                                            <tr>
                                                <th rowspan="2" style="width:50px">No</th>
                                                <th rowspan="2" style="width:250px">Nama</th>
                                                <th colspan="{{ $i }}" style="text-align: center">Tanggal</th>
                                                <th colspan="2" style="width:250px;text-align: center">Ringkasan</th>
                                            </tr>
                                            <tr>
                                                @php
                                                    $time_current= strtotime($time_start);
                                                @endphp
                                                @while ($time_current <= strtotime($time_end))
                                                        <th style="width:150px">{{  date("d M", $time_current)}}</th>
                                                    @php
                                                        $time_current= strtotime("+1 day", $time_current);
                                                    @endphp
                                                @endwhile
                                                <th style="width:200px;text-align: center">Hadir</th>
                                                <th style="width:200px;text-align: center">Tidak Hadir</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kelasGuru->Kelas->Siswa as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->nama_siswa }}</td>
                                                    @php
                                                        $time_current= strtotime($time_start);
                                                        $hadir = 0;
                                                        $tidak_hadir = 0;
                                                    @endphp
                                                    @while ($time_current <= strtotime($time_end))
                                                        @php
                                                            $pelajaranKelas = $pelajaran->where('id_kelas',$kelasGuru->id_kelas)->where('id_guru',$kelasGuru->id_guru)->whereBetween('mulai',[date("Y-m-d 00:00:00", $time_current),date("Y-m-d 23:59:59", $time_current)])->where('selesai',"!=",null)->get();
                                                            $pelajaranKelasSelected = $pelajaranKelas->first();
                                                        @endphp
                                                        @if (!empty($pelajaranKelasSelected))
                                                            @if ($pelajaranKelasSelected->Absensi->where('id_siswa',$item->id)->COUNT()>0 AND $pelajaranKelasSelected->Absensi->where('id_siswa',$item->id)->first()->status == 1)
                                                                <td class="tombolShowPelajaranDetail" style="width:150px" data-toggle="modal" data-target="#showPelajaranDetail" wire:click="showPelajaranDetail({{ $time_current }},{{ $item->id }})"><i class="fa fa-check text-success" aria-hidden="true"></i></td>
                                                                    @php
                                                                        $hadir++;
                                                                    @endphp
                                                            @else
                                                                <td class="tombolShowPelajaranDetail" style="width:150px" data-toggle="modal" data-target="#showPelajaranDetail" wire:click="showPelajaranDetail({{ $time_current }},{{ $item->id }})"><i class="fas fa-user-slash text-{{ ($pelajaranKelasSelected->Absensi->where('id_siswa',$item->id)->first()->keterangan==null)?"danger":"warning" }}"></i></td>
                                                                @php
                                                                    $tidak_hadir++;
                                                                @endphp
                                                            @endif
                                                        @else
                                                            <td style="width:150px">-</td>
                                                        @endif
                                                        @php
                                                            $time_current= strtotime("+1 day", $time_current);
                                                        @endphp
                                                    @endwhile
                                                    <td>{{ $hadir }}</td>
                                                    <td>{{ $tidak_hadir }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @if (COUNT($kelasGuru->Kelas->Siswa)==0)
                                        <div class="alert alert-success text-center" role="alert">
                                            <span class="text-bold text-lg">Tidak Ada Siswa</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="closeModalKelas" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="showPelajaranDetail" wire:ignore.self>
        <div class="modal-dialog modal-lg" wire:ignore.self>
            <div class="modal-content" wire:ignore.self>
                <div class="modal-header">
                    <h4 class="modal-title">Pelajaran yang diikuti</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if (!empty($pelajaranKelasSiswaSelected))
                        <table class="table table-sm table-striped table-hover " id="servisan-table" wire:ignore.self="">
                            <tbody>
                                @foreach ($pelajaranKelasSiswaSelected as $item)
                                    <tr class="mb-3">
                                        <td class="pl-4">
                                            <strong>{{ $item->nama_pelajaran }}</strong> <p class="text-muted" style="margin-bottom:0px !important"> </p>
                                            <p class="text-muted" style="margin-bottom:0px !important"><i class="fas fa-home    "></i> {{ $item->Kelas->nama_kelas }} | Mulai : <i class="fa fa-calendar" aria-hidden="true"></i> {{ date("H:i - d F Y", strtotime($item->mulai))  }}  | Selesai : <i class="fa fa-calendar" aria-hidden="true"></i> {{ date("H:i - d F Y", strtotime($item->selesai))  }}</p>
                                        </td>
                                        <td style="text-align: center; vertical-align: inherit;">
                                            @if ($item->Absensi->where('id_siswa',$idSiswaSelected)->COUNT() > 0 && $item->Absensi->where('id_siswa',$idSiswaSelected)->first()->status == 1)
                                                <button type="button" class="btn btn-success">
                                                    <i class="fas fa-user-check"></i> Hadir
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-danger">
                                                    <i class="fas fa-user-times"></i> Tidak Hadir
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                    @if ($item->Absensi->where('id_siswa',$idSiswaSelected)->COUNT() > 0 && $item->Absensi->where('id_siswa',$idSiswaSelected)->first()->status == 2)
                                        <tr class="mb-3">
                                            <td class="pl-4" colspan="2">
                                                @if ($item->Absensi->where('id_siswa',$idSiswaSelected)->first()->keterangan==null)
                                                    <strong class="text-danger">Tidak ada keterangan tidak hadir.</strong> <br>
                                                @else
                                                    <strong>Keterangan Tidak Hadir : </strong> {{ $item->Absensi->where('id_siswa',$idSiswaSelected)->first()->keterangan }} <br>
                                                    <i>Diberikan pada {{ date("H:i - d F Y", strtotime($item->Absensi->where('id_siswa',$idSiswaSelected)->first()->updated_at))  }} Oleh {{ $item->Absensi->where('id_siswa',$idSiswaSelected)->first()->DiCekOleh->name }}</i> 
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        @if (COUNT($pelajaranKelasSiswaSelected)==0)
                            <div class="alert alert-success text-center" role="alert">
                                <span class="text-bold text-lg">Belum Ada Pelajaran</span>
                            </div>
                        @endif
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="closeModalKelas" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@section('js')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        function setDate(today,endDate){
            $('#date_range').daterangepicker({
                startDate: today,
                endDate: endDate,
                locale: {
                    format: 'DD MMMM YYYY'
                }
            }, function(start, end, label) {
                $("#time_start").val(start.format('YYYY-MM-DD'));
                $("#time_end").val(end.format('YYYY-MM-DD'));
                @this.call('set_date',start.format('YYYY-MM-DD'),end.format('YYYY-MM-DD'));
            });
        }
        $(document).ready(function () {
            const now = new Date();
            var today = new Date(now.getFullYear(), now.getMonth(), 1);
            var endDate = new Date(now.getFullYear(), now.getMonth() + 1, 0);
            setDate(today,endDate);
        });
    </script>
@endsection