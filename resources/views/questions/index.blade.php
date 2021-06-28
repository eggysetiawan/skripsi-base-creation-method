@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item active">Pertanyaan & Table Kuisioner Fotografer</li>
@endsection

@section('content')
    <div class="d-flex justify-content-center">
        <div class="col-md-9">
            <x-alert-success />


            <div class="accordion" id="accordionExample">

                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed stretched-link" type="button" data-toggle="collapse"
                                data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Daftar Pertanyaan Kuisioner

                            </button>
                            <span class="float-right">
                                <a href="{{ route('questions.create') }}" class="btn btn-outline-primary">
                                    Tambah Kuisioner
                                </a>
                            </span>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body dt-responsive">
                            <table class="table table-borderless">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Pertanyaan</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($questions as $question)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $question->question }}</td>
                                            <td>
                                                <a href="{{ route('questions.edit', $question->id) }}"
                                                    class="btn btn-success">Edit
                                                </a>

                                                <form action="{{ route('questions.destroy', $question->id) }}"
                                                    method="post" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"
                                                        onclick="return confirm('Yakin ingin menghapus pertanyaan ini ?')"
                                                        class="btn btn-danger">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne">
                                Table Kuisioner Fotografer
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                        data-parent="#accordionExample">
                        <div class="card-body dt-responsive">
                            <table class="table table-borderless">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Fotografer</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>
                                                <a href="{{ route('scores.rating', $user->username) }}"
                                                    class="btn btn-success">Berikan Penilaian.</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
