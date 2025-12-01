
<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="utf-8"/>
        <title>Daftar | APDERIS</title>
        <meta name="description" content="APDERIS adalah aplikasi management data servis, sparepart dan pembukuaan keuangan">
        <meta name="keywords" content="APDERIS, servis, pencatatan data servis, data servis, management servis, sparepart, pembukuan, akuntansi, buku kas">
        <meta name="author" content="Owafs Technology">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500&display=swap" rel="stylesheet">
        <link href="{{ asset('dist/assets/css/pages/login/login-3.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('dist/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('dist/assets/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('dist/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500&display=swap" rel="stylesheet">
    </head>
    <style>
        .login.login-3 .login-aside .aside-img{
            background-size: 420px;
            background-size: auto; 
                background-color: #fdb746 ;
        }
        .flex-column-auto{
            background-color: #fdb746;
        }
        *{
            font-family: 'Rubik'; 
        }
    </style>
    <body  id="kt_body"  class="header-fixed header-mobile-fixed subheader-enabled sidebar-enabled page-loading"  >
	    <div class="d-flex flex-column flex-root">
            <div class="login login-3 wizard d-flex flex-column flex-lg-row flex-column-fluid wizard" id="kt_login">
                <div class="login-aside d-flex flex-column flex-row-auto">
                    <div class="d-flex flex-column-auto flex-column pt-md-30">
                        <h1 class="font-weight-bolder  display-4 text-center mt-10" style="color: #000000; text-dark-75">Selamat Datang</h1>
                    </div>
                    <div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-x-center bgi-position-y-center" style="background-image: url({{ asset('img/auth.png') }})"></div>
                </div>
                <div class="login-content flex-column-fluid d-flex flex-column p-10">
                    <div class="d-flex flex-row-fluid flex-center">
                        <div class="login-form login-form-signup">
                            <form class="form" novalidate="novalidate" id="" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="" data-wizard-type="step-content" data-wizard-state="current">
                                    <div class="pb-10 pb-lg-15">
                                        <h3 class="font-weight-bolder text-dark display5">Buat Akun Baru</h3>
                                        <div class="text-muted font-weight-bold font-size-h3">
                                            Sudah pernah daftar?
                                            <a href="{{ route('login') }}" class="text-primary font-weight-bolder"> Klik di sini</a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">Nama Kamu</label>
                                        <input type="text" class="form-control h-auto py-5 px-4 border-0 rounded-lg font-size-h6 @error('name') is-invalid @enderror" name="name" id="name" placeholder="Masukkan Nama" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">Alamat Email</label>
                                        <input id="email" type="email" class="form-control h-auto py-5 px-4 border-0 rounded-lg font-size-h6 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Masukkan Email" required autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">Password</label>
                                        <input class="form-control h-auto py-5 px-4rounded-lg border-0 @error('password') is-invalid @enderror" id="password"  type="password" name="password" required autocomplete="current-password"/>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">Konfirmasi Password</label>
                                        <input class="form-control h-auto py-5 px-4 rounded-lg border-0 @error('password') is-invalid @enderror" id="password-confirm"  type="password"  name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-warning btn-lg btn-block font-weight-bolder  font-size-h6 pl-8 pr-7 px-3 my-3">
                                        Daftar  
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
	    </div>
    </body>
</html>