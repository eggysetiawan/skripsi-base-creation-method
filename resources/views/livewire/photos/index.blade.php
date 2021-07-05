<div>
    <div class="row justify-content-center mb-4">
        <div wire:loading>
            <div class="d-flex justify-content-center">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>

        <span class="inline-block" wire:loading.remove>

            @if ($categories->first())
                <ul class="list-group list-group-horizontal-md list-group-accent .clist-group-accent h5">
                    <li class="list-group-item">
                        <a href="#!" wire:click.prevent="all">
                            ALL
                        </a>
                    </li>
                    @foreach ($categories as $category)
                        <li class="list-group-item">
                            <a href="#!" class="text-mute"
                                wire:click.prevent="selectCategory('{{ strtolower($category->category) }}')">
                                {{ strtoupper($category->category) }}
                            </a>
                        </li>
                    @endforeach
                </ul>

            @endif

        </span>

    </div>

    @foreach ($creations as $creation)
        <div class="row justify-content-start mb-3">
            <span class="inline-block" wire:loading.remove>
                <span class="display-4">{{ $creation->title }}</span>
            </span>
        </div>
        <div class="row justify-content-start">
            @foreach ($creation->getMedia('creation') as $img)
                <div class="col-md-4 mb-2">
                    <a href="{{ asset($img->getFullUrl()) }}" data-toggle="lightbox"
                        data-title="{{ $creation->title }}" data-gallery="gallery">
                        <div class="creation-image-thumb">
                            <img src="{{ asset($img->getFullUrl()) }}" class="img-fluid w-100" style="height:16rem"
                                alt="{{ $creation->title }}" />
                        </div>
                    </a>

                </div>
            @endforeach
        </div>
    @endforeach

</div>
