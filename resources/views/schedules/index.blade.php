@extends('layouts.app')

@section('content')
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
                <div class="card-header"><i class="fa fa-align-justify"></i> Schedule</div>
                <div class="card-body">
                    <table class="table table-responsive-sm table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Kegiatan</th>
                                <th>Tanggal Kegiatan</th>
                                <th>Waktu Kegiatan</th>
                                <th>Terlaksana</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 1; $i <= 10; $i++)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>Kegiatan {{ $i }}</td>
                                    <td>{{ date('d F, Y', strtotime('+' . $i . ' days')) }}</td>
                                    <td>{{ date('H:i') }}</td>
                                    <td>
                                        <a href="#" class="mr-4"><i class="cil-pencil"></i></a>
                                        <a href="#"><i class="cil-check"></i></a>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection
