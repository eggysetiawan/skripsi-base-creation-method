<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html" charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    {{-- aos --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    {{-- select2 --}}
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    {{-- mdbootstrap --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    {{-- aos --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />


    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


</head>

<body onload="window.print()">

    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Schedule</div>
                <div class="card-body">
                    <table class="table table-responsive-sm table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                @hasrole('photographer|superadmin|admin')
                                <th>Customer</th>
                                @endhasrole
                                @hasrole('customer|superadmin|admin')
                                <th>Fotografer</th>
                                @endhasrole
                                <th>Tanggal Kegiatan</th>
                                <th>Waktu Kegiatan</th>
                                <th>Status</th>
                                <th>Terlaksana</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($schedules as $schedule)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    @hasrole('photographer|superadmin|admin')
                                    <td>{{ $schedule->detail->name }}</td>
                                    @endhasrole
                                    @hasrole('customer|superadmin|admin')
                                    <td>{{ $schedule->photographer->name }}</td>
                                    @endhasrole
                                    <td>{{ $schedule->date->format('d F, Y') }}</td>
                                    <td>{{ date('H:i', strtotime($schedule->detail->start)) . ' - ' . date('H:i', strtotime($schedule->detail->end)) }}
                                    </td>
                                    <td>
                                        @switch($schedule->is_approved)
                                            @case(1)
                                                Disetujui.
                                            @break
                                            @case(2)
                                                Ditolak.
                                            @break
                                            @default
                                                Menunggu Konfirmasi.
                                        @endswitch
                                    </td>
                                    <td>{{ $schedule->already_done && $schedule->already_done_customer ? 'Terlaksana' : 'Belum Terlaksana' }}
                                    </td>

                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Belum ada data.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>


        </div>



        <script>
            var delayInMilliseconds = 1000; //1 second
            setTimeout(function() {
                window.close();
            }, delayInMilliseconds);
        </script>

    </body>

    </html>
