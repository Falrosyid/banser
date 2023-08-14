<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi - SIBANSER</title>
    <link rel="icon" type="image/x-icon" href="{{asset ('assets/lg-bns.png')}}" />

    <!-- Font Icon -->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('regist/fonts/material-icon/css/material-design-iconic-font.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('regist/css/style.css')}}">
    <link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form" action="{{route('postregist')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <h2 class="form-title">Registrasi!</h2>
                        <hr>
                        <table class="field_wrapper" width="100%;" style="margin-top: 50px;">
                            <tr>
                                <td>Nama Lengkap<span style="color: red;">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="text" class="form-input" name="nama" id="nama" placeholder="Masukkan Nama" required="required" />
                                </td>
                            </tr>
                            <tr>
                                <td>NIK<span style="color: red;">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="text" class="form-input" name="nik" id="nik" placeholder="Masukkan NIK" required="required" />
                                </td>
                            </tr>
                            <tr>
                                <td>Tempat Lahir<span style="color: red;">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="text" class="form-input" name="tp_lahir" id="tp_lahir" placeholder="Masukkan Tempat Lahir" required="required" />
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir<span style="color: red;">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="date" class="form-input" name="tgl_lahir" id="tgl_lahir" placeholder="Tanggal Lahir" required="required" />
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat<span style="color: red;">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="text" class="form-input" name="alamat" id="alamat" placeholder="Alamat" required="required" />
                                </td>
                            </tr>
                            <tr>
                                <td>Ranting<span style="color: red;">*</span></td>
                                <td>:</td>
                                <td>
                                    <select class="form-control" name="ranting_id" style="height: 55px;" required="required">
                                        <option selected>Pilih Ranting</option>
                                        @foreach ($ranting as $data)
                                        <option value="{{$data->id}}" name="ranting_id" >{{$data->nama}}</option> 
                                        @endforeach
                                    </select>  
                                </td>
                            </tr>
                            <tr>
                                <td>Tinggi Badan<span style="color: red;">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="number" class="form-input" name="tg_badan" id="tg_badan" placeholder="Masukkan Tinggi Badan" required="required">
                                </td>
                            </tr>
                            <tr>
                                <td>Foto<span style="color: red;">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="file" class="form-input" name="foto" id="foto" placeholder="Upload File Foto" required="required">
                                </td>
                            </tr>
                            <tr>
                                <td>No Handphone<span style="color: red;">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="text" class="form-input" name="no_hp" id="no_hp" placeholder="Masukkan Nomor Handphone" required="required">
                                </td>
                            </tr>
                            <tr>
                                <td>KTP<span style="color: red;">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="file" class="form-input" name="ktp" id="ktp" placeholder="Upload KTP" required="required">
                                </td>
                            </tr>
                            <tr>
                                <td>Surat Rekomendasi</td>
                                <td>:</td>
                                <td>
                                    <input type="file" class="form-input" name="rekom" id="rekom" placeholder="Upload Surat Rekomendasi">
                                </td>
                            </tr>
                            <tr class="sertifikat">
                                <td>Sertifikat PKD<span style="color: red;">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="file" class="form-input" name="pkd" id="pkd" placeholder="Upload PKD" required="required">
                                </td>
                                <td>
                                    <a class="btn" href="javascript:void(0);" id="add_button" title="Add field"><i class="fas fa-plus-circle"></i></a>
                                </td>
                            </tr>
                        </table>
                        <br>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox small">
                                <input type="checkbox" class="custom-control-input" id="customCheck" required="required">
                                <label class="custom-control-label" for="customCheck">Bersedia mengikuti segala aturan organisasi Banser.</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
                        </div>
                    </form>
                </div>
            </div>

            <script type="text/javascript">
                $(document).ready(function(){
                var maxField = 10; //Input fields increment limitation
                var addButton = $('#add_button'); //Add button selector
                var wrapper = $('.field_wrapper'); //Input field wrapper
                var fieldHTML = '<tr class="sertifikat add" id="sertifikat_nama">';
                fieldHTML=fieldHTML + '<td>Sertifikat Lainnya</td>';
                fieldHTML=fieldHTML + '<td>:</td>';
                fieldHTML=fieldHTML + '<td><input type="text" class="form-input" name="sertifikat_nama[]" placeholder="Nama Sertifikat Diklat"></td>';
                fieldHTML=fieldHTML + '</tr>'; 

                fieldHTML=fieldHTML + '<tr class="sertifikat add" id="sertifikat_tgl">'; 
                fieldHTML=fieldHTML + '<td></td>';
                fieldHTML=fieldHTML + '<td>:</td>';
                fieldHTML=fieldHTML + '<td><input type="date" class="form-input" name="sertifikat_tgl[]" placeholder="Tanggal"></td>';
                fieldHTML=fieldHTML + '</tr>';

                fieldHTML=fieldHTML + '<tr class="sertifikat add" id="sertifikat_tpt">'; 
                fieldHTML=fieldHTML + '<td></td>';
                fieldHTML=fieldHTML + '<td>:</td>';
                fieldHTML=fieldHTML + '<td><input type="text" class="form-input" name="sertifikat_tpt[]" placeholder="Tempat Diklat"></td>';
                fieldHTML=fieldHTML + '</tr>'; 

                fieldHTML=fieldHTML + '<tr class="sertifikat add" id="sertifikat">'; 
                fieldHTML=fieldHTML + '<td></td>';
                fieldHTML=fieldHTML + '<td>:</td>';
                fieldHTML=fieldHTML + '<td><input type="file" class="form-input" name="sertifikat[]" id="sertifikat" placeholder="Upload File" required="required"></td>';
                fieldHTML=fieldHTML + '<td><a href="javascript:void(0);" class="remove_button btn"><i class="fas fa-minus-circle"></i></a></div></td>';
                fieldHTML=fieldHTML + '</tr>'; 
                var x = 1; //Initial field counter is 1

                //Once add button is clicked
                $(addButton).click(function(){
                    //Check maximum number of input fields
                    if(x < maxField){ 
                        x++; //Increment field counter
                        $(wrapper).append(fieldHTML); //Add field html
                    }
                });

                //Once remove button is clicked
                $(wrapper).on('click', '.remove_button', function(e){
                    e.preventDefault();
                    $("#sertifikat_nama").remove(); //Remove field html
                    $("#sertifikat_tgl").remove(); //Remove field html
                    $("#sertifikat_tpt").remove(); //Remove field html
                    $("#sertifikat").remove(); //Remove field html
                    x--; //Decrement field counter
                });
            });
        </script>

    </section>

</div>

<!-- JS -->
<script src="{{asset('regist/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('regist/js/main.js')}}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>