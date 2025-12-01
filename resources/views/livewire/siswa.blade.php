<div>
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <strong><i class="fas fa-users mr-1"></i> Daftar Siswa</strong>
            </div>
            <div class="card-option float-right">
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambahSiswa"><i class="fa fa-user-plus" aria-hidden="true"></i> Tambah Siswa</button>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-sm table-striped table-hover " id="servisan-table" wire:ignore.self="">
                <tbody>
                    @foreach ($siswa as $item)
                        <tr class="mb-3">
                            <td class="pl-4">
                                <strong>{{ $item->nama_siswa }}</strong>
                                <p class="text-muted" style="margin-bottom:0px !important"></p>
                            </td> 
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if (COUNT($siswa)==0)
                <div class="alert alert-success text-center" role="alert">
                    <span class="text-bold text-lg">Tidak Ada Siswa Terdaftar!</span>
                </div>
            @endif
        </div>
    </div>
    <div class="modal fade" id="modalTambahSiswa" wire:ignore.self>
        <div class="modal-dialog" wire:ignore.self>
            <div class="modal-content" wire:ignore.self>
                <form wire:submit.prevent="tambahSiswaBaru">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Siswa Baru</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="namaSiswa" class="form-label">Nama Siswa</label>
                            <input type="text" class="form-control" id="namaSiswa" wire:model="nama" placeholder="Masukkan nama siswa" required>
                          </div>
                          <div class="mb-3">
                            <label for="emailSiswa" class="form-label">Email Siswa</label>
                            <input type="email" class="form-control" id="emailSiswa" wire:model="email" placeholder="Masukkan email siswa" required>
                          </div>
                          <div class="mb-3 form-group">
                            <label for="selectClass" class="form-label">Pilih Kelas</label>
                            <select id="selectClass" class="form-control" wire:model="idKelas">
                              <option value="" selected disabled>Pilih kelas...</option>
                              @foreach ($kelas as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_kelas }}</option>
                              @endforeach
                            </select>
                          </div>
                
                          <div class="alert alert-info">
                            <strong>Catatan:</strong> Password default untuk siswa baru adalah <b>12345678</b>.
                          </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" id="closeModalSiswa" data-dismiss="modal">Close</button>
                        <div wire:loading.remove wire:target="tambahSiswaBaru">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Simpan</button>
                        </div>
                        <div wire:loading wire:target="tambahSiswaBaru">
                            <button class="btn btn-primary"><i class="fas fa-circle-notch fa-spin"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
