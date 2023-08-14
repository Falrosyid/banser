<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SISTEM INFORMASI BANSER</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{asset ('assets/lg-bns.png')}}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <style type="text/css">
        li.dropdown {
            display: inline-block;
        }

        .dropdown:hover .isi-dropdown {
            display: block;
        }

        .isi-dropdown a:hover {
            color: #fff !important;
        }

        .isi-dropdown {
            position: absolute;
            display: none;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            background-color: #f9f9f9;
        }

        .isi-dropdown a {
            margin-left: -30px;
            color: #ebebeb !important;
        }

        .isi-dropdown a:hover {
            color: #232323 !important;
            background: #f3f3f3 !important;
        }
        .picture-slider { 
          margin-left: -35px;
          border: 10px solid #efefef; 
          position: relative; 
          overflow: hidden; 
          background: #efefef;
      }

      .picture-slider { 
          width: 768px;
          height: 450px; 
      }

      .content-slider img { 
          width: 768px;
          height: 450px; 
          float: left;
      }

      .content-slider { 
          position: absolute; 
          width:3900px;  

          /*pengaturan durasi lama tampil gambar bisa di atur di bawah ini*/
          animation-name:slider;
          animation-duration:16s;
          animation-timing-function: ease-in-out;
          animation-iteration-count:infinite;
          -webkit-animation-name:slider;
          -webkit-animation-duration:16s;
          -webkit-animation-timing-function: ease-in-out;
          -webkit-animation-iteration-count:infinite;
          -moz-animation-name:slider;
          -moz-animation-duration:16s;
          -moz-animation-timing-function: ease-in-out;
          -moz-animation-iteration-count:infinite;
          -o-animation-name:slider;
          -o-animation-duration:16s;
          -o-animation-timing-function: ease-in-out;
          -o-animation-iteration-count:infinite;
      }


      /*saat gambar di hover oleh cursor mouse maka berhenti slide*/
      .content-slider:hover { 
          -webkit-animation-play-state:paused; 
          -moz-animation-play-state:paused; 
          -o-animation-play-state:paused; 
          animation-play-state:paused; }
      }

      .content-slider img { 
          float: right;
      }

      .picture-slider:after { 
          font-size: 150px; 
          position: absolute; 
          z-index: 12; 
          color: rgba(255,255,255, 0); 
          -webkit-transition: 1s all ease-in-out; 
          -moz-transition: 1s all ease-in-out; 
          transition: 1s all ease-in-out; 
      }

      .picture-slider:hover:after { 
          color: rgba(255,255,255, 0.6);  
      }



      @-moz-keyframes slider {     
          0% {
           left: 0; opacity: 0; 
       }     
       2% {
           opacity: 1; 
       }     
       20% {
           left: 0; opacity: 1; 
       }     
       21% {
           opacity: 0; 
       }     
       24% {
           opacity: 0; 
       }     
       25% {
           left: -768px; opacity: 1; 
       }       
       45% {
           left: -768px; opacity: 1; 
       }     
       46% {
           opacity: 0; 
       }     
       48% {
           opacity: 0; 
       }     
       50% {
           left: -1536px; opacity: 1; 
       }     
       70% {
           left: -1536px; opacity: 1; 
       }     
       72% {
           opacity: 0; 
       }     
       74% {
           opacity: 0; 
       }    
       75% {
           left: -2304px; opacity: 1; 
       }   	
       95% {
           left: -2304px; opacity: 1; 
       }   	
       97% { 
           left: -2304px; opacity: 0;
       }   	
       100% {
           left: 0; opacity: 0; 
       }
   } 

   @-webkit-keyframes slider {     
      0% {
       left: 0; opacity: 0; 
   }     
   2% {
       opacity: 1; 
   }     
   20% {
       left: 0; opacity: 1; 
   }     
   21% {
       opacity: 0; 
   }     
   24% {
       opacity: 0; 
   }     
   25% {
       left: -768px; opacity: 1; 
   }       
   45% {
       left: -768px; opacity: 1; 
   }     
   46% {
       opacity: 0; 
   }     
   48% {
       opacity: 0; 
   }     
   50% {
       left: -1536px; opacity: 1; 
   }     
   70% {
       left: -1536px; opacity: 1; 
   }     
   72% {
       opacity: 0; 
   }     
   74% {
       opacity: 0; 
   }    
   75% {
       left: -2304px; opacity: 1; 
   }   	
   95% {
       left: -2304px; opacity: 1; 
   }   	
   97% { 
       left: -2304px; opacity: 0;
   }   	
   100% {
       left: 0; opacity: 0; 
   }
} 


@keyframes slider {     
  0% {
   left: 0; opacity: 0; 
}     
2% {
   opacity: 1; 
}     
20% {
   left: 0; opacity: 1; 
}     
21% {
   opacity: 0; 
}     
24% {
   opacity: 0; 
}     
25% {
   left: -768px; opacity: 1; 
}     
45% {
   left: -768px; opacity: 1; 
}     
46% {
   opacity: 0; 
}     
48% {
   opacity: 0; 
}     
50% {
   left: -1536px; opacity: 1; 
}     
70% {
   left: -1536px; opacity: 1; 
}     
72% {
   opacity: 0; 
}     
74% {
   opacity: 0; 
}    
75% {
   left: -2304px; opacity: 1; 
}   	
95% {
   left: -2304px; opacity: 1; 
}   	
97% { 
   left: -2304px; opacity: 0; 
} 

100% {
   left: 0; opacity: 0; 
}
}
</style>
<link href="{{asset ('lp/css/styles.css')}}" rel="stylesheet" />
</head>
<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top">SIBANSER</a>
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#about">Sejarah</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#portfolio">Tentang</a></li>
                    <?php if (\Auth::check()): ?>
                        <li class="dropdown nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#">{{auth()->user()->name}} ({{auth()->user()->role}})</a>
                            <ul class="isi-dropdown bg-secondary">
                                <a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('anggota')}}">Keanggotaan</a>
                                <a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('proker')}}">Program Kerja</a>
                                <a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('kegiatan')}}">Kegiatan</a>
                                <a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('logout')}}"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout</a>
                            </ul>
                        </li>
                        <?php else: ?>
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{route('login')}}">Log in</a></li>
                        <?php endif ?>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image-->
                <img class="masthead-avatar mb-5" src="{{asset ('assets/lg-bns.png')}}" alt="..." />
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">Sistem Informasi Banser</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <!-- <p class="masthead-subheading font-weight-light mb-0">Graphic Artist - Web Designer - Illustrator</p> -->
            </div>
        </header>
        <!-- Portfolio Section-->
        <!-- About Section-->
        <section class="page-section mb-0" id="about">
        	<div class="container">
        		@if(Session::has('berhasil'))
        		<div class="alert alert-success">
        			{{ Session::get('berhasil') }}
        			@php
        			Session::forget('berhasil');
        			@endphp
        		</div>
        		@endif
                @if(Session::has('gagal'))
                <div class="alert alert-warning">
                    {{ Session::get('gagal') }}
                    @php
                    Session::forget('gagal');
                    @endphp
                </div>
                @endif
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase">Sejarah</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- About Section Content-->
                <div class="row">
                    <div class="text-center mt-4">
                        <p class="lead">Dalam Muktamar ke-9 NU di Banyuwangi, Jawa Timur pada 1934, mulai tampak peran tokoh-tokoh muda NU berpandangan luas seperti Mahfudz Siddiq, Wahid Hasyim, Thohir Bakri, Abdullah Ubaid, dan anak-anak muda lainnya. Mereka ikut menyampaikan pandangannya mengenai berbagai masalah kemasyarakatan dan kebangsaan. Ansor dilahirkan dari rahim Nahdlatul Ulama (NU) dari situasi konflik internal dan tuntutan kebutuhan alamiah. Berawal dari perbedaan antara tokoh tradisional dan tokoh modernis yang muncul di tubuh Nahdlatul Wathan, organisasi keagamaan yang bergerak di bidang pendidikan Islam, pembinaan mubaligh, dan pembinaan kader. KH Abdul Wahab Chasbullah, tokoh tradisional dan KH Mas Mansyur yang berhaluan modernis, akhirnya menempuh arus gerakan yang berbeda justru saat tengah tumbuhnya semangat untuk mendirikan organisasi kepemudaan Islam.</p>
                        <p class="lead">Dua tahun setelah perpecahan itu, pada 1924 para pemuda yang mendukung KH Abdul Wahab Chasbullah yang kemudian menjadi pendiri NU membentuk wadah dengan nama Syubbanul Wathan (Pemuda Tanah Air). Organisasi tersebut yang menjadi cikal bakal berdirinya Gerakan Pemuda Ansor setelah sebelumnya mengalami perubahan nama seperti Persatuan Pemuda NU (PPNU), Pemuda NU (PNU), dan Anshoru Nahdlatul Oelama (ANO). Nama Ansor ini merupakan saran KH Wahab Chasbullah, “ulama besar” sekaligus guru besar kaum muda saat itu, yang diambil dari nama kehormatan yang diberikan Nabi Muhammad SAW kepada penduduk Madinah yang telah berjasa dalam perjuangan membela dan menegakkan agama Allah. Dengan demikian ANO dimaksudkan dapat mengambil hikmah serta teladan terhadap sikap, perilaku dan semangat perjuangan para sahabat Nabi yang mendapat predikat Ansor tersebut.</p>
                        <p class="lead">Gerakan ANO (yang kelak disebut GP Ansor) harus senantiasa mengacu pada nilai-nilai dasar Sahabat Ansor, yakni sebagai penolong, pejuang dan bahkan pelopor dalam menyiarkan, menegakkan dan membentengi ajaran Islam. Inilah komitmen awal yang harus dipegang teguh setiap anggota ANO (GP Ansor). Meski ANO dinyatakan sebagai bagian dari NU, secara formal organisatoris belum tercantum dalam struktur organisasi NU. Hubungan ANO dengan NU saat itu masih bersifat hubungan pribadi antar tokoh. Baru pada Muktamar ke-9 NU di Banyuwangi, tepatnya pada tanggal 10 Muharam 1353 H atau 24 April 1934, ANO diterima dan disahkan sebagai bagian (departemen) pemuda NU dengan pengurus antara lain: Ketua H.M. Thohir Bakri; Wakil Ketua Abdullah Oebayd; Sekretaris H. Achmad Barawi dan Abdus Salam. Dalam perkembangannya secara diam-diam khususnya ANO Cabang Malang, mengembangkan organisasi gerakan kepanduan yang disebut Banoe (Barisan Ansor Nahdlatul Oelama) yang kelak disebut Banser (Barisan Serbaguna). (Choirul Anam, Pertumbuhan dan Perkembangan NU, 2010).</p>
                    </div>
                </div>
                <!-- About Section Button-->
                <div class="text-center mt-4">
                </div>
            </div>
        </section>
        <section class="page-section portfolio bg-primary" id="portfolio">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white mb-0">Tentang</h2>
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <h2 class="text-secondary text-center text-uppercase">Kantor Banser Banyuwangi</h2>
                <br>
                <div class="row">
                    <div class="col-sm-4">
                        <img class="img-fluid rounded mb-5" src="{{asset ('lp/assets/img/kantor.png')}}" alt="..." style="max-height: 240px; width: : auto;" />
                    </div>
                    <div class="col-sm-4">
                        <img class="img-fluid rounded mb-5 " src="{{asset ('lp/assets/img/kantor_pcnu.jpeg')}}" alt="..." style="margin-left: 10%; max-height: 240px; width: : auto;" />
                    </div>
                    <div class="col-sm-4">
                        <img class="img-fluid rounded mb-5" src="{{asset ('lp/assets/img/kantor.png')}}" alt="..." style="max-height: 240px; width: : auto;" />
                    </div>
                </div>
                <hr>
                <p class="lead text-center text-white mb-0">
                    Kantor Banser yang Beralamatkan di JL. Jendral Ahmad Yani No. 56
                    <br />
                    Kec. Banyuwangi, Kab. Banyuwangi
                </p>
            </div>
        </section>
        <section class="page-section mb-0" id="about">
            <div class="container">
                <h2 class="page-section-heading text-center text-uppercase">Struktural Banser</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- About Section Content-->
                <div class="row">
                    <div class="text-center mt-4">
                        <img class="img-fluid rounded mb-5" src="{{asset ('lp/assets/img/struktural_2021.png')}}" alt="..." />
                    </div>
                </div>
                <hr>
                <p class="lead text-center mb-0">
                    Struktural Organisasi Banser periode 2022-2024
                </p>
            </div>
        </section>

        <section class="page-section portfolio bg-primary" id="portfolio">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white mb-0">Kegiatan Banser</h2>
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <h2 class="text-secondary text-center text-uppercase">Kantor Banser Banyuwangi</h2>
                <br>
                <div class="row">
                    @foreach($kegiatan as $data)
                    <div class="col-sm-4">
                        <img src="{{ asset ('public/img/kegiatan/'.$data->foto) }}" width="320" height="240" style="margin-left: 10%;" >
                        <hr>
                        <h4 class="text-center">{{$data->keterangan}}</h4>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="text-center">
                        <h4 class="text-uppercase mb-4">Lokasi</h4>
                        <p class="lead mb-0">
                         Jl. Jendral Ahmad Yani No. 56
                         <br />
                         Kec. Banyuwangi, Kab. Banyuwangi
                     </p>
                 </div>
             </div>
         </div>
     </footer>
     <!-- Copyright Section-->
     <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright &copy; SIBANSER 2021</small></div>
    </div>
    
<!-- Bootstrap core JS-->
<script src="{{asset ('lp/js/bootstrap.min.js')}}"></script>
<script src="{{asset ('lp/js/bootstrap.bundle.min.js')}}"></script>
<!-- Core theme JS-->
<script src="{{asset ('lp/js/scripts.js')}}"></script>
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                               SB Forms JS                               * *-->
<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

<script type="text/javascript">
 var slideIndex = 1;
 showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
	showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
	showSlides(slideIndex = n);
}

function showSlides(n) {
	var i;
	var slides = document.getElementsByClassName("mySlides");
	var dots = document.getElementsByClassName("dot");
	if (n > slides.length) {slideIndex = 1}
		if (n < 1) {slideIndex = slides.length}
			for (i = 0; i < slides.length; i++) {
				slides[i].style.display = "none";
			}
			for (i = 0; i < dots.length; i++) {
				dots[i].className = dots[i].className.replace(" active", "");
			}
			slides[slideIndex-1].style.display = "block";
			dots[slideIndex-1].className += " active";
		}
	</script>
    </html>
