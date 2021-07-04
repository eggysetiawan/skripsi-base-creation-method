<div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Find Fotografer</div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-12" wire:ignore>
                            <select name="category" id="category" class="form-control" wire:model="category_find">
                                <option value="" selected>Pilih Kategory</option>
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
                                    <label for="{{ $criteria->name }}">{{ ucfirst($criteria->name) }} :
                                        {{ ${$criteria->name} }}
                                    </label>
                                    <input type="range" name="{{ $criteria->name }}" id="{{ $criteria->name }}"
                                        min="0" max="5" class="custom-range"
                                        wire:model.debounce.500ms="{{ $criteria->name }}">
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary btn-block" wire:click.prevent="sortMaut">Find</button>
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

    {{-- @dump('harga : '.$harga)
    @dump('durasi : '.$durasi)
    @dump('teknologi : '.$teknologi)
    @dump('service : '.$service)
    @dump('capacity : '.$capacity)
    @dump('profesionalitas : '.$profesionalitas) --}}
    @dump('total : '.($harga+$durasi+$teknologi+$service+$capacity+$profesionalitas))

    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table table-striped">

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
    </div>
    @if ($table)
        <span class="inline-block" wire:loading.remove>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header"> Metode MAUT</div>
                        <div class="card-body">
                            <div class="row">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header"> Metode Base Creation</div>
                        <div class="card-body">
                            <div class="row">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </span>
    @endif

</div>
