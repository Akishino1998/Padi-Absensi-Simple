<!-- Nis Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nis', 'Nis:') !!}
    {!! Form::text('nis', null, ['class' => 'form-control','maxlength' => 20,'maxlength' => 20]) !!}
</div>

<!-- Nisn Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nisn', 'Nisn:') !!}
    {!! Form::text('nisn', null, ['class' => 'form-control','maxlength' => 20,'maxlength' => 20]) !!}
</div>

<!-- Nama Siswa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_siswa', 'Nama Siswa:') !!}
    {!! Form::text('nama_siswa', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Jenis Kelamin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis_kelamin', 'Jenis Kelamin:') !!}
    {!! Form::text('jenis_kelamin', null, ['class' => 'form-control']) !!}
</div>

<!-- Tempat Lahir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tempat_lahir', 'Tempat Lahir:') !!}
    {!! Form::text('tempat_lahir', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>

<!-- Tanggal Lahir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_lahir', 'Tanggal Lahir:') !!}
    {!! Form::text('tanggal_lahir', null, ['class' => 'form-control','id'=>'tanggal_lahir']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#tanggal_lahir').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Agama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('agama', 'Agama:') !!}
    {!! Form::text('agama', null, ['class' => 'form-control','maxlength' => 20,'maxlength' => 20]) !!}
</div>

<!-- Alamat Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('alamat', 'Alamat:') !!}
    {!! Form::textarea('alamat', null, ['class' => 'form-control']) !!}
</div>

<!-- No Hp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_hp', 'No Hp:') !!}
    {!! Form::text('no_hp', null, ['class' => 'form-control','maxlength' => 15,'maxlength' => 15]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Nama Ayah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_ayah', 'Nama Ayah:') !!}
    {!! Form::text('nama_ayah', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Nama Ibu Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_ibu', 'Nama Ibu:') !!}
    {!! Form::text('nama_ibu', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Nama Wali Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_wali', 'Nama Wali:') !!}
    {!! Form::text('nama_wali', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Pekerjaan Ortu Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pekerjaan_ortu', 'Pekerjaan Ortu:') !!}
    {!! Form::text('pekerjaan_ortu', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- No Hp Ortu Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_hp_ortu', 'No Hp Ortu:') !!}
    {!! Form::text('no_hp_ortu', null, ['class' => 'form-control','maxlength' => 15,'maxlength' => 15]) !!}
</div>

<!-- Id Kelas Aktif Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_kelas_aktif', 'Id Kelas Aktif:') !!}
    {!! Form::number('id_kelas_aktif', null, ['class' => 'form-control']) !!}
</div>

<!-- Tahun Masuk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tahun_masuk', 'Tahun Masuk:') !!}
    {!! Form::text('tahun_masuk', null, ['class' => 'form-control','id'=>'tahun_masuk']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#tahun_masuk').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Status Siswa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_siswa', 'Status Siswa:') !!}
    {!! Form::text('status_siswa', null, ['class' => 'form-control']) !!}
</div>