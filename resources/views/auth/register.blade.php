<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up - SIBANSER</title>
    <link rel="icon" type="image/x-icon" href="{{asset ('assets/lg-bns.png')}}" />

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('regist/fonts/material-icon/css/material-design-iconic-font.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('regist/css/style.css')}}">
    <link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form" action="{{ route('postuser', $cek->id)}}">
                        {{ csrf_field() }}
                        <h2 class="form-title">Registrasi Akun!</h2>
                        @if(Session::has('gagal'))
                        <div class="alert alert-danger">
                          {{ Session::get('gagal') }}
                          @php
                          Session::forget('gagal');
                          @endphp
                      </div>
                      
                      @endif
                      @foreach ($anggota as $anggota)
                    <div class="form-group">
                        <input type="text" class="form-input" name="nik" id="nik" placeholder="NIK" value="{{$anggota->nik}}" disabled="" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-input" name="nama" id="name" placeholder="Nama lengkap" required="required" value="{{$anggota->nama}}" disabled="" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-input" name="ranting" id="name" placeholder="Ranting" required="required" value="{{$anggota->ranting}}" disabled="" />
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-input" name="email" id="email" placeholder="Email"/>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-input" name="password" id="password" placeholder="Password"/>
                        <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-input" name="re_password" id="re_password" placeholder="Ulangi password"/>
                    </div>
                    <hr>
                    <div class="form-group">
                        <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
                    </div>
                    @endforeach
                </form>
                <p class="loginhere">
                    Sudah Punya Akun ? <a href="/login" class="loginhere-link">Login</a>
                </p>
            </div>
        </div>
    </section>

</div>

<!-- JS -->
<script src="{{asset('regist/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('regist/js/main.js')}}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>