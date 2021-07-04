@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item active">Pertanyaan & Table Kuisioner Fotografer</li>
@endsection

@section('content')
    <div class="d-flex justify-content-center">
        <div class="col-md-12">
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
                            <table class="table table-striped table-hover">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Fotografer</th>
                                        @foreach ($criterias as $criteria)
                                            <th>{{ ucfirst($criteria->name) }}</th>
                                        @endforeach
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->name }}</td>

                                            @foreach ($user->scores as $score)
                                                <td class="text-center font-weight-bold">
                                                    {{ $score->score }}
                                                </td>
                                            @endforeach
                                            {{-- <td>{{ $user->score }}</td> --}}
                                            @if ($user->score)
                                                <td>
                                                    <a href="{{ route('scores.edit', $user->username) }}"
                                                        class="btn btn-warning">Edit Penilaian.</a>
                                                </td>
                                            @else
                                                <td class="text-center">-</td>
                                                <td class="text-center">-</td>
                                                <td class="text-center">-</td>
                                                <td class="text-center">-</td>
                                                <td class="text-center">-</td>
                                                <td class="text-center">-</td>

                                                <td>
                                                    <a href="{{ route('scores.rating', $user->username) }}"
                                                        class="btn btn-success">Berikan Penilaian.</a>
                                                </td>
                                            @endif
                                            </td>
                                        </tr>
                                    @empty

                                        <tr>
                                            <td colspan="9" class="text-center">Belum ada Fotografer yang mengisi kuisioner.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
