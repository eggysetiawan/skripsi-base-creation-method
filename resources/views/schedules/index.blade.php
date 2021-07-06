@extends('layouts.app')

@section('content')
    <x-alert />
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="form-group">
                <label for="activity_name">Nama Kegiatan</label>
                <input type="text" class="form-control" id="activity_name" placeholder="Cari kegiatan..">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="activity_date">Tanggal Kegiatan</label>
                <input type="date" name="activity_date" class="form-control" id="activity_date">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="activity_time">Waktu Kegiatan</label>
                <input type="time" name="activity_time" class="form-control" id="activity_time">
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Schedule</div>
                <div class="card-body">
                    <table class="table table-responsive-sm table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Customer</th>
                                <th>Fotografer</th>
                                <th>Tanggal Kegiatan</th>
                                <th>Waktu Kegiatan</th>
                                <th>Terlaksana</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($schedules as $schedule)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $schedule->detail->name }}</td>
                                    <td>{{ $schedule->photographer->name }}</td>
                                    <td>{{ $schedule->date }}</td>
                                    <td>{{ $schedule->date }}</td>
                                    <td>{{ $schedule->already_done ? 'Terlaksana' : 'Belum Terlaksana' }}</td>
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



    {{-- Metode Test --}}
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="h5">
                Harga : {{ $price }}
                Duraasi : {{ $duration }}
                Layanan : {{ $service }}
            </div>


        </div>
        <div class="row justify-content-center">
            <div class="align-item-center h4">
                Hasil Metode : {{ $result }}

            </div>
        </div>
    </div> --}}

@endsection
