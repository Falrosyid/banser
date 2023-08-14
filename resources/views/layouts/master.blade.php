<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title') - {{config('app.name')}}</title> 
    <link rel="icon" type="image/x-icon" href="{{asset ('assets/lg-bns.png')}}" />
    <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>

    <!-- Custom fonts for this template-->
    <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <style type="text/css">
        .form-input {
            width: 100%;
            border: 1px solid rgb(235, 235, 235);
            padding: 17px 20px;
            box-sizing: border-box;
            font-size: 14px;
            font-weight: 500;
            color: $black-color;
            &::-webkit-input-placeholder {
                font-weight: 500;
            }
            &::-moz-placeholder {
                font-weight: 500;
            }
            &:-ms-input-placeholder {
                font-weight: 500;
            }
            &:-moz-placeholder {
                font-weight: 500;
            }
            &:focus {
                border: 1px solid transparent;
                -webkit-border-image-source: 
                -webkit-linear-gradient(to right, rgb(159,172,230),  rgb(116,235,213)); 
                -moz-border-image-source:
                -moz-linear-gradient(to right, rgb(159,172,230),  rgb(116,235,213)); 
                -o-border-image-source:
                -o-linear-gradient(to right, rgb(159,172,230),  rgb(116,235,213));
                border-image-source:
                linear-gradient(to right, rgb(159,172,230),  rgb(116,235,213));
                -webkit-border-image-slice: 1;
                border-image-slice: 1;
                background-origin: border-box;
                background-clip: content-box, border-box;
            }

        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('layouts.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layouts.header')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    @yield('content')
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                @include('layouts.footer')
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Bootstrap core JavaScript-->
        <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{asset('assets/js/sb-admin-2.min.js')}}"></script>

        <!-- Page level plugins -->
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>

        <!-- Page level custom scripts -->
        <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
        <script src="{{asset('js/demo/chart-area-demo.js')}}"></script>
        <script src="{{asset('js/demo/chart-pie-demo.js')}}"></script>

</body>

</html>