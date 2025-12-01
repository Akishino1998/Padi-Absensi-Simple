<div class="table-responsive">
    <table class="table" id="siswas-table">
        <thead>
        <tr>
            <th>Nis</th>
        <th>Nisn</th>
        <th>Nama Siswa</th>
        <th>Jenis Kelamin</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Agama</th>
        <th>Alamat</th>
        <th>No Hp</th>
        <th>Email</th>
        <th>Nama Ayah</th>
        <th>Nama Ibu</th>
        <th>Nama Wali</th>
        <th>Pekerjaan Ortu</th>
        <th>No Hp Ortu</th>
        <th>Id Kelas Aktif</th>
        <th>Tahun Masuk</th>
        <th>Status Siswa</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($siswas as $siswa)
            <tr>
                <td>{{ $siswa->nis }}</td>
            <td>{{ $siswa->nisn }}</td>
            <td>{{ $siswa->nama_siswa }}</td>
            <td>{{ $siswa->jenis_kelamin }}</td>
            <td>{{ $siswa->tempat_lahir }}</td>
            <td>{{ $siswa->tanggal_lahir }}</td>
            <td>{{ $siswa->agama }}</td>
            <td>{{ $siswa->alamat }}</td>
            <td>{{ $siswa->no_hp }}</td>
            <td>{{ $siswa->email }}</td>
            <td>{{ $siswa->nama_ayah }}</td>
            <td>{{ $siswa->nama_ibu }}</td>
            <td>{{ $siswa->nama_wali }}</td>
            <td>{{ $siswa->pekerjaan_ortu }}</td>
            <td>{{ $siswa->no_hp_ortu }}</td>
            <td>{{ $siswa->id_kelas_aktif }}</td>
            <td>{{ $siswa->tahun_masuk }}</td>
            <td>{{ $siswa->status_siswa }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['siswas.destroy', $siswa->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('siswas.show', [$siswa->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('siswas.edit', [$siswa->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
