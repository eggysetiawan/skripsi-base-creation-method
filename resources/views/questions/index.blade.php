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
                                            @if ($user->has('scores'))
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

                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree"
                                aria-expanded="true" aria-controls="collapseThree">
                                Parameter Penilaian
                            </button>
                        </h2>
                    </div>

                    <div id="collapseThree" class="collapse show" aria-labelledby="headingOne"
                        data-parent="#accordionExample">
                        <div class="card-body dt-responsive">
                            <table class="table table-striped table-hover table-bordered">
                                <thead>

                                    <tr>
                                        <th colspan="2" scope="colgroup" class="text-center">Harga</th>
                                        <th class="text-center">Durasi / Jam</th>
                                        <th colspan="2" scope="colgroup" class="text-center">Teknologi</th>
                                        <th colspan="2" scope="colgroup" class="text-center">Service</th>
                                        <th class="text-center">Capacity</th>
                                        <th colspan="2" scope="colgroup" class="text-center">Profesionalitas</th>
                                    </tr>

                                </thead>

                                <tbody>
                                    <tr>
                                        <td scope="col" class="text-center">Mulai dari</td>
                                        <td scope="col" class="text-center">IDR 100K</td>
                                        <td scope="col" class="text-center">1-</td>
                                        <td scope="col" class="text-center">1</td>
                                        <td scope="col" class="text-center">Entry Level</td>
                                        <td scope="col" class="text-center">1</td>
                                        <td scope="col" class="text-center">File photo</td>
                                        <td scope="col" class="text-center">8</td>
                                        <td scope="col" class="text-center">1-3 Tahun</td>
                                        <td scope="col" class="text-center">Pemula</td>
                                    </tr>
                                    <tr>
                                        <td scope="col" class="text-center">Sampai dengan</td>
                                        <td scope="col" class="text-center">IDR 2000K</td>
                                        <td scope="col" class="text-center">-12</td>
                                        <td scope="col" class="text-center">2</td>
                                        <td scope="col" class="text-center">Mid - Range</td>
                                        <td scope="col" class="text-center">2</td>
                                        <td scope="col" class="text-center">File photo dan editing colourin</td>
                                        <td scope="col" class="text-center">16</td>
                                        <td scope="col" class="text-center">4-6 Tahun</td>
                                        <td scope="col" class="text-center">Profesional</td>
                                    </tr>

                                    <tr>
                                        <td scope="col" class="text-center" colspan="2">&nbsp;</td>
                                        <td scope="col" class="text-center">&nbsp;</td>
                                        <td scope="col" class="text-center">3</td>
                                        <td scope="col" class="text-center">Semi - Advanced</td>
                                        <td scope="col" class="text-center" colspan="2">
                                            Ket : Kelengkapan Pelayanan yang
                                            diberikan
                                        </td>
                                        <td scope="col" class="text-center">32</td>
                                        <td scope="col" class="text-center"> > 7 Tahun</td>
                                        <td scope="col" class="text-center">Artist</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="col" class="text-center" colspan="2">Ket: Harga/ budget yang diinginkan
                                            (dicari)</th>
                                        <th scope="col" class="text-center">Ket: Sesi waktu pemotretan</th>
                                        <th scope="col" class="text-center" colspan="2">
                                            Teknologi adalah kamera yang digunakan
                                        </th>
                                        <th scope="col" class="text-center" colspan="2">
                                            Ket : Kelengkapan Pelayanan yang
                                            diberikan
                                        </th>
                                        <th scope="col" class="text-center">Kapasitas memori yang diberikan</th>
                                        <th scope="col" class="text-center" colspan="2">
                                            Ket : Lama pengalaman yang sudah dilalui
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
