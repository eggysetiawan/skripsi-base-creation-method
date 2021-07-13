@extends('layouts.app')


@section('breadcrumb')
    <li class="breadcrumb-item active">Kriteria</li>
@endsection

@section('content')


    <div class="d-flex justify-content-center">
        <div class="col-md-9">
            <x-alert-success />
        @role('superadmin')
        <a href="{{ route('criterias.create') }}" class="btn btn-primary mb-2">Add criteria</a>
        @endrole
            <div class="card">
                <div class="card-header"><i class="fa fa-align-justify"></i> Daftar Kriteria</div>
                <div class="card-body">
                    <table class="table table-responsive-sm table-striped text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Kriteria</th>
                                <th>Benefical</th>
                               @role('superadmin')
                               <th></th>
                               @endrole
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($criterias as $criteria)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ ucfirst($criteria->name) }}</td>
                                    <td>
                                        @if ($criteria->is_benefical)
                                            Benefical

                                        @else
                                            Non benefical
                                        @endif
                                    </td>
                                   @role('superadmin')
                                   <td>
                                    <a href="{{ route('criterias.edit', $criteria->slug) }}"
                                        class="btn btn-success">Edit</a>
                                    <form action="{{ route('criterias.destroy', $criteria->slug) }}" class="d-inline"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('are you sure?')">Delete</button>
                                    </form>
                                </td>
                                   @endrole
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


@endsection
