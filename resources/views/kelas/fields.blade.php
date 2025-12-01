<!-- Nama Kelas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_kelas', 'Nama Kelas:') !!}
    {!! Form::text('nama_kelas', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>

<!-- Tingkat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tingkat', 'Tingkat:') !!}
    {!! Form::number('tingkat', null, ['class' => 'form-control']) !!}
</div>