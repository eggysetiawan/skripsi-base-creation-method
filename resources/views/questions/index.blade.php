@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="col-md-9">
            <x-alert-success />
            <div class="card">
                <div class="card-header"> Daftar Pertanyaan Kuisioner <span class="float-right"><a
                            href="{{ route('questions.create') }}" class="btn btn-outline-primary">Tambah
                            Kuisioner</a></span></div>
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

                                        <form action="{{ route('questions.destroy', $question->id) }}" method="post"
                                            class="d-inline">
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
    </div>
@endsection
