<div>
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <strong><i class="fas fa-user-graduate mr-1"></i> Daftar Guru</strong>
            </div>
            <div class="card-option float-right">
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambahGuru"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Guru</button>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-sm table-striped table-hover " id="servisan-table" wire:ignore.self="">
                <tbody>
                    @foreach ($guru as $item)
                        <tr class="mb-3">
                            <td class="pl-4">
                                <strong>{{ $item->nama_guru }}</strong>
                                <p class="text-muted" style="margin-bottom:0px !important"></p>
                            </td> 
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if (COUNT($guru)==0)
                <div class="alert alert-success text-center" role="alert">
                    <span class="text-bold text-lg">Tidak Ada Guru Terdaftar!</span>
                </div>
            @endif
        </div>
    </div>
    <div class="modal fade" id="modalTambahGuru" wire:ignore.self>
        <div class="modal-dialog" wire:ignore.self>
            <div class="modal-content" wire:ignore.self>
                <form wire:submit.prevent="tambahGuruBaru">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Guru Baru</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="namaGuru" class="form-label">Nama Guru</label>
                            <input type="text" class="form-control" id="namaGuru" wire:model="nama" placeholder="Masukkan nama guru" required>
                          </div>
                          <div class="mb-3">
                            <label for="emailGuru" class="form-label">Email Guru</label>
                            <input type="email" class="form-control" id="emailGuru" wire:model="email" placeholder="Masukkan email guru" required>
                          </div>
                          <div class="alert alert-info">
                            <strong>Catatan:</strong> Password default untuk guru baru adalah <b>12345678</b>.
                          </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" id="closeModalGuru" data-dismiss="modal">Close</button>
                        <div wire:loading.remove wire:target="tambahGuruBaru">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Simpan</button>
                        </div>
                        <div wire:loading wire:target="tambahGuruBaru">
                            <button class="btn btn-primary"><i class="fas fa-circle-notch fa-spin"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
