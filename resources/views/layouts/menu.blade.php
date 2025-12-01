<style>
    .nav-link {
        border-radius: 20px !important;
    }
</style>
@if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"dashboard")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"dashboard")->first()->id:"")->COUNT()>0 )
    <li class="nav-item mt-1">
        <a href="{{ route('dashboard') }}" class="nav-link  {{ (request()->routeIs('dashboard')) ? 'active' : '' }}">
            <i class="nav-icon fas fa-home"></i>
            <p>
                Dashboard
            </p>
        </a>
    </li> 
@endif

@if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"shift.index")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"shift.index")->first()->id:"")->COUNT()>0 )
    <li class="nav-item mt-1">
        <a href="{{ route('shift.index') }}" class="nav-link  {{ (request()->routeIs('shift*')) ? 'active' : '' }}">
            
            <i class="nav-icon fas fa-store"></i>
            <p>
                Shift
            </p>
        </a>
    </li> 
@endif


@if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"servisan")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"servisan")->first()->id:"")->COUNT()>0 )
    <li class="nav-item  {{ (request()->routeIs('servisan*')) ? 'menu-open' : '' }}">
        <a href="#" class="nav-link {{ (request()->routeIs('servisan*')) ? 'active' : '' }}">
            <i class="nav-icon fas fa-tools"></i>
            <p>
                Servisan
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"servisan.baru")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"servisan.baru")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="{{ route('servisan.baru') }}" class="nav-link {{ (request()->routeIs('servisan.baru')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>Buat Baru</p>
                    </a>
                </li>
            @endif

            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"servisan.masuk")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"servisan.masuk")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="{{ route('servisan.masuk') }}" class="nav-link {{ (request()->routeIs('servisan.masuk')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-sign-in-alt"></i>
                        <p>Masuk & Proses</p>
                    </a>
                </li>
            @endif

            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"servisan.selesai")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"servisan.selesai")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="{{ route('servisan.selesai') }}" class="nav-link {{ (request()->routeIs('servisan.selesai')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-clipboard-check"></i> 
                        <p>Selesai</p>
                    </a>
                </li>
            @endif

            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"servisan.keluar")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"servisan.keluar")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="{{ route('servisan.keluar') }}" class="nav-link {{ (request()->routeIs('servisan.keluar')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Keluar</p>
                    </a>
                </li>
            @endif

            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"servisan.klaim")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"servisan.klaim")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="{{ route('servisan.klaim') }}" class="nav-link {{ (request()->routeIs('servisan.klaim')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-sign-in-alt"></i> 
                        <p>Klaim Garansi</p>
                    </a>
                </li>
            @endif
            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"servisan.semua")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"servisan.semua")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="{{ route('servisan.semua') }}" class="nav-link {{ (request()->routeIs('servisan.semua')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-folder-open"></i>
                        <p>Semua</p>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif
@if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"harga")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"harga")->first()->id:"")->COUNT()>0 )
    <li class="nav-item mt-1">
        <a href="{{ route('harga.servis') }}" class="nav-link  {{ (request()->routeIs('harga*')) ? 'active' : '' }}">
            <i class="nav-icon fas fa-wrench"></i> 
            <p>
                Harga Servisan
            </p>
        </a>
    </li> 
@endif
@if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"toko.pelanggan.index")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"toko.pelanggan.index")->first()->id:"")->COUNT()>0 )
    <li class="nav-item mt-1">
        <a href="{{ route('toko.pelanggan.index') }}" class="nav-link  {{ (request()->routeIs('toko.pelanggan*')) ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>
                Pelanggan
            </p>
        </a>
    </li> 
@endif

@if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"buku-kas-harian.index")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"buku-kas-harian.index")->first()->id:"")->COUNT()>0 )
    <li class="nav-item mt-1">
        <a href="{{ route('buku-kas-harian.index') }}" class="nav-link  {{ (request()->routeIs('buku-kas-harian*')) ? 'active' : '' }}">
            <i class="nav-icon fas fa-book"></i>
            <p>
                Buku Kas Toko
            </p>
        </a>
    </li> 
@endif

@if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"toko.pengeluaran.index")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"toko.pengeluaran.index")->first()->id:"")->COUNT()>0 )
    <li class="nav-item mt-1">
        <a href="{{ route('toko.pengeluaran.index') }}" class="nav-link  {{ (request()->routeIs('toko.pengeluaran*')) ? 'active' : '' }}">
            <i class="nav-icon fas fa-wallet"></i>
            <p>
                Pengeluaran Toko
            </p>
        </a>
    </li> 
@endif

@if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"sparepart")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"sparepart")->first()->id:"")->COUNT()>0 )
    <li class="nav-item {{ Request::is('sparepart*') ? 'menu-open' : '' }}  mt-1">
        <a href="#" class="nav-link {{ Request::is('sparepart*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-boxes"></i>
            <p>
                Sparepart
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"sparepart.index")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"sparepart.index")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="{{ route('sparepart.index') }}" class="nav-link {{ (request()->routeIs('sparepart.index')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>Data Sparepart</p>
                    </a>
                </li>
            @endif
            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"sparepart.pos")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"sparepart.pos")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="{{ route('sparepart.pos') }}" class="nav-link {{ (request()->routeIs('sparepart.pos')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-shopping-basket"></i>
                        <p>Penjualan</p>
                    </a>
                </li>
            @endif
            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"sparepart.riwayatPenjualan")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"sparepart.riwayatPenjualan")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="{{ route('sparepart.riwayatPenjualan') }}" class="nav-link {{ (request()->routeIs('sparepart.riwayatPenjualan')) ? 'active' : '' }} {{ (request()->routeIs('sparepart.penjualan*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-history"></i>
                        <p>Riwayat Penjualan</p>
                    </a>
                </li>
            @endif
            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"sparepart.riwayatRefund")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"sparepart.riwayatRefund")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="{{ route('sparepart.riwayatRefund') }}" class="nav-link {{ (request()->routeIs('sparepart.riwayatRefund')) ? 'active' : '' }} {{ (request()->routeIs('sparepart.refund*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-history"></i>
                        <p>Riwayat Refund</p>
                    </a>
                </li>
            @endif
            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"sparepart.pembelian")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"sparepart.pembelian")->first()->id:"")->COUNT()>0 )
            <li class="nav-item">
                <a href="{{ route('sparepart.pembelian') }}" class="nav-link {{ (request()->routeIs('sparepart.pembelian')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-truck-loading"></i>
                    <p>Pembelian</p>
                </a>
            </li>
            @endif
            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"sparepart.retur")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"sparepart.retur")->first()->id:"")->COUNT()>0 )
            <li class="nav-item">
                <a href="{{ route('sparepart.retur') }}" class="nav-link {{ (request()->routeIs('sparepart.retur*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-truck-loading"></i>
                    <p>Retur</p>
                </a>
            </li>
            @endif
            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"sparepart.stokOpname.index")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"sparepart.stokOpname.index")->first()->id:"")->COUNT()>0 )
            <li class="nav-item">
                <a href="{{ route('sparepart.stokOpname.index') }}" class="nav-link {{ (request()->routeIs('sparepart.stokOpname.index')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-sticky-note"></i>
                    <p>Opname</p>
                </a>
            </li>
            @endif
        </ul>
    </li>
@endif

@if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"aktivitas")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"aktivitas")->first()->id:"")->COUNT()>0 )
    <li class="nav-item {{ Request::is('aktivitas*') ? 'menu-open' : '' }}  mt-1">
        <a href="#" class="nav-link {{ Request::is('aktivitas*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-history"></i>
            <p>
                Aktivitas
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"aktivitas.transaksi")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"aktivitas.transaksi")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="{{ route('aktivitas.transaksi') }}" class="nav-link {{ (request()->routeIs('aktivitas.transaksi')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-receipt"></i>
                        <p>Transaksi</p>
                    </a>
                </li>
            @endif
            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"aktivitas.sparepart")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"aktivitas.sparepart")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="{{ route('aktivitas.sparepart') }}" class="nav-link {{ (request()->routeIs('aktivitas.sparepart')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>Stok Sparepart</p>
                    </a>
                </li>
            @endif
            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"aktivitas.servisan")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"aktivitas.servisan")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="{{ route('aktivitas.servisan') }}" class="nav-link {{ (request()->routeIs('aktivitas.servisan')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tools"></i>
                        <p>Servisan</p>
                    </a>
                </li>
            @endif
           
        </ul>
    </li>
@endif

@if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"akuntansi")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"akuntansi")->first()->id:"")->COUNT()>0 )
    <li class="nav-item {{ Request::is('akuntansi*') ? 'menu-open' : '' }}  mt-1">
        <a href="#" class="nav-link {{ Request::is('akuntansi*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-table"></i>
            <p>
                Akuntansi
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"akuntansi.ju")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"akuntansi.ju")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="{{ route('akuntansi.ju') }}" class="nav-link {{ (request()->routeIs('akuntansi.ju')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-money-check"></i>
                        <p>Jurnal Umum</p>
                    </a>
                </li>
            @endif
            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"akuntansi.nc")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"akuntansi.nc")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="{{ route('akuntansi.nc') }}" class="nav-link {{ (request()->routeIs('akuntansi.nc')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-money-check"></i>
                        <p>Neraca Saldo</p>
                    </a>
                </li>
            @endif
            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"akuntansi.labarugi")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"akuntansi.labarugi")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="{{ route('akuntansi.labarugi') }}" class="nav-link {{ (request()->routeIs('akuntansi.labarugi')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-invoice"></i> 
                        <p>Laba Rugi</p>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif


@if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"laporan")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"laporan")->first()->id:"")->COUNT()>0 )
    <li class="nav-item {{ Request::is('laporan*') ? 'menu-open' : '' }}  mt-1">
        <a href="#" class="nav-link {{ Request::is('laporan*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-book"></i>
            <p>
                Laporan
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"laporan.servisan")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"laporan.servisan")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="{{ route('laporan.servisan') }}" class="nav-link {{ (request()->routeIs('laporan.servisan')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tools"></i>
                        <p>Servisan</p>
                    </a>
                </li>
            @endif
            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"laporan.sparepart")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"laporan.sparepart")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="{{ route('laporan.sparepart') }}" class="nav-link {{ (request()->routeIs('laporan.sparepart')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>Sparepart</p>
                    </a>
                </li>
            @endif
            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"laporan.kinerja.teknisi")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"laporan.kinerja.teknisi")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="{{ route('laporan.kinerja.teknisi') }}" class="nav-link {{ (request()->routeIs('laporan.kinerja.teknisi')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>Kinerja Teknisi</p>
                    </a>
                </li>
            @endif
            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"laporan.teknisi")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"laporan.teknisi")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="{{ route('laporan.teknisi') }}" class="nav-link {{ (request()->routeIs('laporan.teknisi')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>Bagi Hasil Teknisi</p>
                    </a>
                </li>
            @endif
            @if (date("Y-m-d", strtotime(NOW()))>="2024-08-01")
                @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"laporan.gaji")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"laporan.gaji")->first()->id:"")->COUNT()>0 )
                    <li class="nav-item">
                        <a href="{{ route('laporan.gaji') }}" class="nav-link {{ (request()->routeIs('laporan.gaji')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-file-invoice"></i>
                            <p>Gaji Karyawan</p>
                        </a>
                    </li>
                @endif
            @endif
            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"laporan.kinerja.toko")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"laporan.kinerja.toko")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="{{ route('laporan.kinerja.toko') }}" class="nav-link {{ (request()->routeIs('laporan.kinerja.toko')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>Kinerja Toko</p>
                    </a>
                </li>
            @endif
            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"laporan.keuangan")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"laporan.keuangan")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="{{ route('laporan.keuangan') }}" class="nav-link {{ (request()->routeIs('laporan.keuangan')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-money-bill"></i>
                        <p>Keuangan</p>
                    </a>
                </li>
            @endif
            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"laporan.labarugi")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"laporan.labarugi")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="{{ route('laporan.labarugi') }}" class="nav-link {{ (request()->routeIs('laporan.labarugi')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-invoice"></i>
                        <p>Laba Rugi</p>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif
@if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"pendapatan")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"pendapatan")->first()->id:"")->COUNT()>0 )
    <li class="nav-item {{ Request::is('pendapatan*') ? 'menu-open' : '' }}  mt-1">
        <a href="#" class="nav-link {{ Request::is('pendapatan*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-table"></i>
            <p>
                Pendapatan
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"pendapatan.servisan")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"pendapatan.servisan")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="{{ route('pendapatan.servisan') }}" class="nav-link {{ (request()->routeIs('pendapatan.servisan')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tools"></i>
                        <p>Servisan</p>
                    </a>
                </li>
            @endif
            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"pendapatan.sparepart")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"pendapatan.sparepart")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="{{ route('pendapatan.sparepart') }}" class="nav-link {{ (request()->routeIs('pendapatan.sparepart')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>Sparepart</p>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif
@if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"toko.profil")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"toko.profil")->first()->id:"")->COUNT()>0 )
    <li class="nav-item  {{ (request()->routeIs('toko.profil*')) ? 'menu-open' : '' }}">
        <a href="#" class="nav-link {{ (request()->routeIs('toko.profil*')) ? 'active' : '' }}">
            <i class="nav-icon fas fa-home"></i>
            <p>
                Profil Toko
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"toko.profil.toko.index")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"toko.profil.toko.index")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="{{ route('toko.profil.toko.index') }}" class="nav-link {{ (request()->routeIs('toko.profil.toko*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-store"></i>
                        <p>Profil</p>
                    </a>
                </li>
            @endif
            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"toko.profil.layanan-toko")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"toko.profil.layanan-toko")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="{{ route('toko.profil.layanan-toko.index') }}" class="nav-link {{ (request()->routeIs('toko.profil.layanan-toko*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tablet-alt"></i>
                        <p>Layanan</p>
                    </a>
                </li>
            @endif

            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"toko.profil.aturan-toko")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"toko.profil.aturan-toko")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="{{ route('toko.profil.aturan-toko.index') }}" class="nav-link {{ (request()->routeIs('toko.profil.aturan-toko*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tablet-alt"></i>
                        <p>Syarat dan Ketentuan</p>
                    </a>
                </li>
            @endif
            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"toko.profil.ulasan")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"toko.profil.ulasan")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="{{ route('toko.profil.ulasan') }}" class="nav-link {{ (request()->routeIs('toko.profil.ulasan*')) ? 'active' : '' }}">
                        <i class="nav-icon far fa-smile"></i> 
                        <p>Ulasan</p>
                    </a>
                </li>
            @endif
            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"toko.profil.setting")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"toko.profil.setting")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="{{ route('toko.profil.setting') }}" class="nav-link {{ (request()->routeIs('toko.profil.setting*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-wrench"></i>
                        <p>Setting</p>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif
@if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"kupon")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"kupon")->first()->id:"")->COUNT()>0 )
    <li class="nav-item  {{ (request()->routeIs('kupon*')) ? 'menu-open' : '' }}">
        <a href="#" class="nav-link {{ (request()->routeIs('kupon*')) ? 'active' : '' }}">
            <i class="nav-icon fas fa-ticket-alt"></i>
            <p>
                Kupon
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"kupon.index")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"kupon.index")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="{{ route('kupon.index') }}" class="nav-link {{ (request()->routeIs('kupon*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-store"></i>
                        <p>Kupon</p>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif

@if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"setting")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"setting")->first()->id:"")->COUNT()>0 )
    <li class="nav-item {{ Request::is('setting*') ? 'menu-open' : '' }}  mt-1">
        <a href="#" class="nav-link {{ Request::is('setting*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-table"></i>
            <p>
                Setting
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"setting.changelog.index")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"setting.changelog.index")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="{{ route('setting.changelog.index') }}" class="nav-link {{ (request()->routeIs('setting.changelog*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-money-check"></i>
                        <p>Changelog</p>
                    </a>
                </li>
            @endif
            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"setting.app.index")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"setting.app.index")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="{{ route('setting.app.index') }}" class="nav-link {{ (request()->routeIs('setting.app*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-money-check"></i>
                        <p>Aplikasi</p>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif
@if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"aset")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"aset")->first()->id:"")->COUNT()>0 )
    <li class="nav-item mt-1">
        <a href="{{ route('aset.index') }}" class="nav-link  {{ (request()->routeIs('aset*')) ? 'active' : '' }}">
            <i class="nav-icon fas fa-boxes"></i> 
            <p>
                Aset
            </p>
        </a>
    </li> 
@endif
{{-- ADMIN --}}
@if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"dashboard-admin")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"dashboard-admin")->first()->id:"")->COUNT()>0 )
    <li class="nav-item mt-1">
        <a href="{{ route('dashboard-admin') }}" class="nav-link  {{ (request()->routeIs('dashboard-admin')) ? 'active' : '' }}">
            <i class="nav-icon fas fa-home"></i>
            <p>
                Dashboard
            </p>
        </a>
    </li> 
@endif
@if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"admin.toko")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"admin.toko")->first()->id:"")->COUNT()>0 )
    <li class="nav-item mt-1">
        <a href="{{ route('admin.toko') }}" class="nav-link  {{ (request()->routeIs('admin.toko')) ? 'active' : '' }}">
            <i class="nav-icon fas fa-home"></i>
            <p>
                Toko
            </p>
        </a>
    </li> 
@endif
@if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"token")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"token")->first()->id:"")->COUNT()>0 )
    <li class="nav-item {{ Request::is('token*') ? 'menu-open' : '' }}  mt-1">
        <a href="#" class="nav-link {{ Request::is('token*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-table"></i>
            <p>
                Token
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"token.index")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"token.index")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="{{ route('token.index') }}" class="nav-link {{ (request()->routeIs('token.index')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-money-check"></i>
                        <p>Generate</p>
                    </a>
                </li>
            @endif
            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"token.list")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"token.list")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="{{ route('token.list') }}" class="nav-link {{ (request()->routeIs('token.list')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-money-check"></i>
                        <p>Data Token</p>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif


@if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"master")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"master")->first()->id:"")->COUNT()>0 )
    <li class="nav-item {{ Request::is('master*') ? 'menu-open' : '' }}  mt-1">
        <a href="#" class="nav-link {{ Request::is('master*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-table"></i>
            <p>
                Master
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"master.sparepart")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"master.sparepart")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Sparepart
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"master.sparepart-kategori.index")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"master.sparepart-kategori.index")->first()->id:"")->COUNT()>0 )
                            <li class="nav-item">
                                <a href="{{ route('master.sparepart-kategori.index') }}" class="nav-link {{ (request()->routeIs('master.sparepart-kategori*')) ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-list"></i>
                                    <p>Kategori</p>
                                </a>
                            </li>
                        @endif
                        @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"master.sparepart-merk.index")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"master.sparepart-merk.index")->first()->id:"")->COUNT()>0 )
                            <li class="nav-item">
                                <a href="{{ route('master.sparepart-merk.index') }}" class="nav-link {{ (request()->routeIs('master.sparepart-merk*')) ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-list"></i>
                                    <p>Merk</p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"master.voucher.index")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"master.voucher.index")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="{{ route('master.voucher.index') }}" class="nav-link {{ (request()->routeIs('master.voucher*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-money-check"></i>
                        <p>Vouchers</p>
                    </a>
                </li>
            @endif
            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"master.paket-pembayaran.index")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"master.paket-pembayaran.index")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="{{ route('master.paket-pembayaran.index') }}" class="nav-link {{ (request()->routeIs('master.paket-pembayaran*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-wallet"></i>
                        <p>Paket Pembayaran</p>
                    </a>
                </li>
            @endif
            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"master.bank.index")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"master.bank.index")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="{{ route('master.bank.index') }}" class="nav-link {{ (request()->routeIs('master.bank*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-university"></i>
                        <p>Bank</p>
                    </a>
                </li>
            @endif

            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"master.pengguna.index")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"master.pengguna.index")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="{{ route('master.pengguna.index') }}" class="nav-link {{ (request()->routeIs('master.pengguna*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Pengguna</p> 
                    </a>
                </li>
            @endif
            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"master.karyawan.index")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"master.karyawan.index")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="{{ route('master.karyawan.index') }}" class="nav-link {{ (request()->routeIs('master.karyawan*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>Karyawan</p> 
                    </a>
                </li>
            @endif
            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"master.brankas.index")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"master.brankas.index")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="{{ route('master.brankas.index') }}" class="nav-link {{ (request()->routeIs('master.brankas*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>Brankas</p>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endifz
@if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"admin.servis")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"admin.servis")->first()->id:"")->COUNT()>0 )
    <li class="nav-item">
        <a href="#" class="nav-link {{ (request()->routeIs('admin.servis*')) ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>
                Servisan
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview" style="display: none;">
            @if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"admin.servis.fixLaporanTeknisi")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"admin.servis.fixLaporanTeknisi")->first()->id:"")->COUNT()>0 )
                <li class="nav-item">
                    <a href="{{ route('admin.servis.fixLaporanTeknisi') }}" class="nav-link {{ (request()->routeIs('admin.servis.fixLaporanTeknisi*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>Fix Laporan Teknisi</p>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif
@if (Auth::user()->Role->RolePermission->where('id_permission',($providerPermission->where("route_name",'LIKE',"log")->COUNT()>0)?$providerPermission->where("route_name",'LIKE',"log")->first()->id:"")->COUNT()>0 )
    <li class="nav-item mt-1">
        <a href="{{ route('log') }}" class="nav-link {{ (request()->routeIs('log')) ? 'active' : '' }}">
            <i class="nav-icon fas fa-file-medical-alt"></i>
            <p>
                <strong>Log Traffic</strong>
            </p>
        </a>
    </li>
@endif