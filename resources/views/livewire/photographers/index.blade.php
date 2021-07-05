<div>
    <div class="row justify-content-end">
        <div class="col-md-3">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input type="search" class="form-control" placeholder="Cari Nama.." autocomplete="off"
                    wire:model="query">
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Daftar Fotografer</div>

                <div class="card-body">
                    <div class="row justify-content-start mb-2">
                        @foreach ($photographers as $photographer)
                            <div class="col-md-4 mb-5 mt-2">
                                <div class="row">
                                <img src="@if ($photographer->getFirstMediaUrl('displaypicture')) {{ asset($photographer->getFirstMediaUrl('displaypicture')) }} @else
                                    {{ asset('images/default.png') }} @endif"
                                    alt="{{ auth()->user()->name }}"
                                    class="img-thumbnail mx-auto rounded-circle w-50" height="25rem;">
                                </div>
                                <div class="row justify-content-center">
                                    <a href="{{ route('photographer.show', $photographer->username) }}"
                                        class="card-text text-muted stretched-link">
                                        <h5>{{ ucfirst($photographer->name) }}</h5>
                                    </a>
                                </div>

                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
