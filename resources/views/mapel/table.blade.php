<div class="table-responsive">
    <table class="table" id="mapels-table">
        <thead>
        <tr>
            <th>Kode Mapel</th>
        <th>Nama Mapel</th>
        <th>Deskripsi</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($mapels as $mapel)
            <tr>
                <td>{{ $mapel->kode_mapel }}</td>
            <td>{{ $mapel->nama_mapel }}</td>
            <td>{{ $mapel->deskripsi }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['mapels.destroy', $mapel->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('mapels.show', [$mapel->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('mapels.edit', [$mapel->id]) }}"
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
