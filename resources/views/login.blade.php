<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Akun</title>
</head>
<body>
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-5 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <label for="">LOGIN</label>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Maasukan Email ....">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Maasukan password ....">
                        </div>

                        <button class="btn btn-login btn-block btn-success">LOGIN</button>
                    </div>
                </div>

                <div class="text-center" style="margin-top:15px;">
                    Belum Punya AKun <a href="/register">Silahkan Register</a>
                </div>
            </div>

            
        </div>
    </div>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>

<script>
    $(document).ready(function() {

        $(".btn-login").click(function(){

            let email = $("#email").val();
            let password = $("#password").val();
            let token = $("meta[name='csrf-token']").attr("content");

            if(email.length == "") {

                Swal.fire({
                    'type' : 'error',
                    'title' : 'Oops...',
                    'text' : 'Email tidak boleh kosong'
                });
            } else if(password.length == "") {

                Swal.fire({
                    'type' : 'error',
                    'title' : 'Oops...',
                    'text' : 'Password tidak boleh kosong'
                });
            } else {
                $.ajax({
                    url : "{{ route('login.check_login') }}",
                    type : "POST",
                    dataType : "JSON",
                    cache : false,
                    data : {
                        "email" : email,
                        "password" : password,
                        "_token" : token
                    },
                    success : function(response) {
                        if(response.success) {

                            Swal.fire({
                                'type' : 'success',
                                'title' : 'Login Berhasil',
                                'text' : 'Silahkan Tunggu 3 detik',
                                'timer' : 3000,
                                'showConfirmButton' : false,
                                'showcancelButton' : false
                            })
                                .then(function() {
                                    window.location.href = "{{ route('dashboard.index') }}";
                                });
                            //window.location.href = "/home";
                        } else {
                            //console.log(response.success);
                            Swal.fire({
                                'type' : 'error',
                                'title' : 'Oops...',
                                'text' : 'Login Gagal Email atau Password Salah'
                            });
                        }
                        console.log(response)
                    },
                    error:function(response){

                    Swal.fire({
                        type: 'error',
                        title: 'Opps!',
                        text: 'Login Gagal Email atau Password Salah'
                    });

                    console.log(response);

                    }
                });
            }
        });
    });
</script>
</body>
</html>