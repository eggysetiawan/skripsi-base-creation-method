<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html" charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" href="{{ base_path() }}/public/images/logo.jpeg" type="image/png">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" media="all">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" media="all"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js" media="all"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" media="all"></script>
    <title>Jadwal Foto</title>
    <style>
        div.absolute {
            position: absolute;
            width: 50%;
            bottom: 10px;
        }

        .center {
            margin: auto;
            width: 80%;
            padding: 10px;
        }

        * {
            box-sizing: border-box;
        }

        /* Create two equal columns that floats next to each other */
        .column {
            float: left;
            width: 50%;
            padding: 10px;
            height: 300px;
            /* Should be removed. Only for demonstration */
        }

        .column-time {
            float: left;
            width: 50%;
            padding: 10px;
            height: 80px;
            /* Should be removed. Only for demonstration */
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

    </style>

</head>

<body>
    <div>
        <center>
            <img class="img-fluid w-25 text-center" src="{{ base_path() }}/public/images/logo.jpeg" alt="">
        </center>
    </div>


    <div class="center">

        <div class="row">

            <div class="column-time">
                <dt class="col-sm-3">Tanggal Foto</dt>
                <dd class="col-sm-9">{{ $schedule->date->format('d F, Y') }}</dd>
            </div>
            <div class="column-time">
                <dt class="col-sm-3">Waktu</dt>
                <dd class="col-sm-9">
                    {{ date('H:i', strtotime($schedule->detail->start)) . ' - ' . date('H:i', strtotime($schedule->detail->end)) }}
                </dd>
            </div>
        </div>
        <div class="row">

            <div class="column" style="background-color:#aaa;">
                <h2 class="center">Customer</h2>
                <dt class="col-sm-3">Nama Pemesan</dt>
                <dd class="col-sm-9">{{ $schedule->detail->name }}</dd>

                <dt class="col-sm-3">No. Hp</dt>
                <dd class="col-sm-9">{{ $schedule->detail->mobile }}</dd>

                <dt class="col-sm-3">Email</dt>
                <dd class="col-sm-9">{{ $schedule->detail->email }}</dd>
            </div>
            <div class="column" style="background-color:#bbb;">
                <h2 class="center">Fotografer</h2>
                <dt class="col-sm-3">Nama Pemesan</dt>
                <dd class="col-sm-9">{{ $schedule->photographer->name }}</dd>

                <dt class="col-sm-3">No. Hp</dt>
                <dd class="col-sm-9">{{ $schedule->photographer->mobile }}</dd>

                <dt class="col-sm-3">Email</dt>
                <dd class="col-sm-9">{{ $schedule->photographer->email }}</dd>
            </div>
        </div>

        <div class="row">
            <p>Catatan : {{ $schedule->detail->note }}</p>
        </div>
    </div>

    <div class="absolute">
        <img class="img-fluid w-50 text-center" style="-ms-transform: rotate(20deg);
        transform: rotate(20deg);" src="{{ base_path() }}/public/images/approved.png" alt="">

    </div>

</body>

</html>
