<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Document</title>
</head>
<body>
    <div class="container" style="margin-top:50px;">
        <div class="row">

            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item active">MAIN MENU</li>
                    <a href="{{ route('dashboard.index') }}" class="list-group-item" style="color:aqua">Dashboard</a>
                    <li class="list-group-item">Profile</li>
                    <a href="{{ route('dashboard.logout') }}" class="list-group-item" style="color: blue">Logout</a>
                </ul>
            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <label for="">Dashboard</label>
                        <hr>
                        Selamat datang {{ Auth::user()->name }}
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>