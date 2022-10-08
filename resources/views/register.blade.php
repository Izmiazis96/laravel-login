<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register Akun</title>
</head>
<body>
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-5 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <Label>Register</Label>
                        <hr>

                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_lengkap" placeholder="Masukan nama lengkap">
                        </div>

                        <div class="form-group">
                            <label for="">Alamat Email</label>
                            <input type="text" class="form-control" id="email" placeholder="Masukan Email lengkap">
                        </div>

                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="text" class="form-control" id="password" placeholder="Masukan password">
                        </div>

                        <button class="btn btn-register btn-block btn-success">Register</button>
                    </div>
                </div>

                <div class="text-center" style="margin-top:15px">
                    Sudah Punya Akun <a href="/login">Silahkan Login</a>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
<script>
    $(document).ready(function() {
        $(".btn-register").click( function() {
            let nama_lengkap = $("#nama_lengkap").val();
            let email        = $("#email").val();
            let password     = $("#password").val();
            let token        = $("meta[name ='csrf-token']").attr("content");

            if (nama_lengkap.length == " ") {
                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Nama Lengkap Wajib Isi !'
                });                
            } else if(email.length == " ") {
                Swal.fire({
                    type: 'Warning',
                    title: 'Oops',
                    text: 'Email harus diisi'
                });
            } else if (password.length == "") {
                Swal.fire({
                    type: 'Warning',
                    title: 'Oops',
                    text: 'Password wajib diisi !'
                });
            
            } else {

                // ajax
                $.ajax({

                    url: "{{ route('register.store') }}",
                    type: "POST",
                    cache: false,
                    data: {
                        "nama_lengkap" : nama_lengkap,
                        "email" : email,
                        "password" : password,
                        "_token" : token
                    },

                    success:function(response){
                    console.log(response)    

                        if(response.success) {
                            Swal.fire({
                                type: 'success',
                                title: 'Register Berhasil !',
                                text: 'Silahkan Login'
                            });

                            $("#nama_lengkap").val('');
                            $("#email").val('');
                            $("#password").val('');
                        
                        }else{
                            Swal.fire({
                                type: 'error',
                                title: 'Register Gagal !',
                                text: 'Silahkan Coba Lagi!'
                            });
                        }

                        console.log(response)
                    },

                    error:function(response){
                        Swal.fire({
                            type: 'error',
                            title: 'Oops!',
                            text: 'server-error!'
                        });
                    }
                })
            }
        });
    });
</script>

</body>
</html>