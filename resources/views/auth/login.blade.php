<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - SIBANSER</title>
    <link rel="icon" type="image/x-icon" href="{{asset ('assets/lg-bns.png')}}" />

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('regist/fonts/material-icon/css/material-design-iconic-font.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('regist/css/style.css')}}">
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                	<form method="POST" id="signup-form" class="signup-form" action="{{route('postlogin')}}">
                		{{ csrf_field() }}
                		<h2 class="form-title"><img src="{{asset('assets/lg-bns.png')}}"></h2>
                		<h2 class="form-title">Login</h2>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Masukkan Email.."/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Password"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                        	<button type="submit" class="btn form-submit btn-block">
                        		Login
                        	</button>
                        </div>
                    </form>
                    <p class="loginhere">
                        Belum Menjadi Anggota ? <a href="{{route('register')}}" class="loginhere-link">Daftar Sekarang</a>.
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