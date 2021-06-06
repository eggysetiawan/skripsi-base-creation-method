@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"><i class="fa fa-align-justify"></i> Daftar Kriteria</div>
                <div class="card-body">
                    <table class="table table-responsive-sm table-striped text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Kriteria</th>
                                <th>Nilai kriteria</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($criterias as $criteria)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $criteria->name }}</td>
                                    <td>{{ $criteria->score ?? 0 }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


@endsection
