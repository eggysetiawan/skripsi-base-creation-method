<div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Whoops! something error.</h5>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-header"> Find Fotografer</div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-12" wire:ignore>
                            <select name="category" id="category" class="form-control" wire:model="category_find">

                                <option value="" selected>Semua Kategory</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->category }}">{{ ucfirst($category->category) }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="row">

                        @foreach ($criterias as $criteria)
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="{{ $criteria->name }}">{{ ucfirst($criteria->name) }}
                                    </label>
                                    {{-- <input type="range" name="{{ $criteria->name }}" id="{{ $criteria->name }}"
                                        min="0" max="5" class="custom-range"
                                        wire:model.debounce.500ms="{{ $criteria->name }}"> --}}

                                    <input type="number" name="{{ $criteria->name }}" id="{{ $criteria->name }}"
                                        min="1" max="{{ $criteria->max }}"
                                        wire:model.debounce.500ms="{{ $criteria->name }}" class="form-control">
                                    <small>
                                        <small>
                                            max {{ $criteria->max }}.
                                        </small>
                                    </small>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary btn-block" wire:click.prevent="sortMaut" @if (!$errors->isEmpty()) disabled @endif>Find</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div wire:loading>
            <div class="d-flex justify-content-center">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
    </div>

    @if ($table)

        {{-- <div class="row justify-content-around">
            <div class="col-md-6">
                <h3 class="text-center">Table Matriks MAUT</h3>
                <table class="table table-striped table-responsive">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Alternatif</th>
                            @foreach ($criterias as $criteria)
                                <th class="text-center">{{ $criteria->name }}</th>
                            @endforeach
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($photographers as $photographer)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $photographer->name }}
                                </td>
                                @foreach ($photographer->scores as $score)
                                    <td class="text-center">{{ $score->score }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
            <div class="col-md-6">
                <h3 class="text-center">Table Matriks Weighted Sum Model</h3>
                <table class="table table-striped table-responsive">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Alternatif</th>
                            @foreach ($criterias as $criteria)
                                <th class="text-center">{{ $criteria->name }}</th>
                            @endforeach
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($photographers as $photographer)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $photographer->name }}
                                </td>
                                @foreach ($photographer->scores as $score)
                                    <td class="text-center">{{ $score->score }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div> --}}
        <span class="inline-block" wire:loading.remove>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Sort by MAUT</div>
                        <div class="card-body">
                            <div class="row">
                                <table class="table table-striped table-responsive">
                                    <thead>
                                        <tr class="text-center">
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Preferensi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mauts as $maut)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $maut['name'] }}</td>
                                                <td>{{ $maut['preference'] }}</td>
                                                <td>
                                                    <div class="text-center">
                                                        <div>
                                                            <a href="#" class="btn btn-success btn-sm">Pilih
                                                                Fotografer</a>
                                                        </div>
                                                        <div class="mt-2">
                                                            <a href="#" class="btn btn-info btn-sm">Lihat Profil</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Sort by Weighted Sum Model</div>
                        <div class="card-body">
                            <div class="row">
                                <table class="table table-striped table-responsive">
                                    <thead>
                                        <tr class="text-center">
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Preferensi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($weighteds as $weighted)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $weighted['name'] }}</td>
                                                <td>{{ $weighted['preference'] }}</td>
                                                <td>
                                                    <div class="text-center">
                                                        <div>
                                                            <a href="#" class="btn btn-success btn-sm">Pilih
                                                                Fotografer</a>
                                                        </div>
                                                        <div class="mt-2">
                                                            <a href="#" class="btn btn-info btn-sm">Lihat Profil</a>
                                                        </div>
                                                    </div>
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
        </span>
    @endif

</div>
