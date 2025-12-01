<div class="table-responsive">
    <table class="table" id="gurus-table">
        <thead>
        <tr>
            <th>Nip</th>
        <th>Nama Guru</th>
        <th>Jenis Kelamin</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Alamat</th>
        <th>No Hp</th>
        <th>Email</th>
        <th>Pendidikan Terakhir</th>
        <th>Tanggal Mulai</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($gurus as $guru)
            <tr>
                <td>{{ $guru->nip }}</td>
            <td>{{ $guru->nama_guru }}</td>
            <td>{{ $guru->jenis_kelamin }}</td>
            <td>{{ $guru->tempat_lahir }}</td>
            <td>{{ $guru->tanggal_lahir }}</td>
            <td>{{ $guru->alamat }}</td>
            <td>{{ $guru->no_hp }}</td>
            <td>{{ $guru->email }}</td>
            <td>{{ $guru->pendidikan_terakhir }}</td>
            <td>{{ $guru->tanggal_mulai }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['gurus.destroy', $guru->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('gurus.show', [$guru->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('gurus.edit', [$guru->id]) }}"
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
