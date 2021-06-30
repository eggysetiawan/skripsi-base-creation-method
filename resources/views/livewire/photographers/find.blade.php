<div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><i class="fa fa-align-justify"></i> Find Fotografer</div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <select name="category" id="category" class="form-control">
                                <option value="">Kategori</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="capacity">Capacity :
                                    {{ $capacity }}
                                </label>
                                <input type="range" name="capacity" id="capacity" min="0" max="5" class="form-control"
                                    wire:model.debounce.500ms="capacity">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="duration">Duration :
                                    {{ $duration }}
                                </label>
                                <input type="range" name="duration" id="duration" min="0" max="5" class="form-control"
                                    wire:model.debounce.500ms="duration">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="professionality">professionality :
                                    {{ $professionality }}
                                </label>
                                <input type="range" name="professionality" id="professionality" min="0" max="5"
                                    class="form-control" wire:model.debounce.500ms="professionality">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="rate">rate :
                                    {{ $rate }}
                                </label>
                                <input type="range" name="rate" id="rate" min="0" max="5" class="form-control"
                                    wire:model.debounce.500ms="rate">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="service">service :
                                    {{ $service }}
                                </label>
                                <input type="range" name="service" id="service" min="0" max="5" class="form-control"
                                    wire:model.debounce.500ms="service">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="technology">technology :
                                    {{ $technology }}
                                </label>
                                <input type="range" name="technology" id="technology" min="0" max="5"
                                    class="form-control" wire:model.debounce.500ms="technology">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (!$table)
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
    @endif

</div>
