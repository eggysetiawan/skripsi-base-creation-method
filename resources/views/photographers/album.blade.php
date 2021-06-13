  {{-- <div class="row justify-content-center mb-4">
      <ul class="list-group list-group-horizontal-md list-group-accent .clist-group-accent h5 ">
          <li class="list-group-item">
              <a href="#!" wire:click="all">
                  ALL
              </a>
          </li>
          @foreach ($categories as $category)
              <li class="list-group-item">
                  <a href="#!" class="text-mute" wire:click="selectCategory($category->category)">
                      {{ strtoupper($category->category) }}
                  </a>
              </li>
          @endforeach
      </ul>
  </div>

  @foreach ($creations as $creation)
      <div class="row justify-content-start mb-3">
          <span class="display-4">{{ $creation->title }}</span><br>
      </div>
      <div class="row justify-content-start">

          @foreach ($creation->getMedia('creation') as $media)
              <div class="col-md-4 mb-4">
                  <div class="card" style="width: 18rem;">
                      <img src="{{ asset($media->getFullUrl('thumb')) }}" class="card-img-top" alt="..." height="200"
                          style="object-fit: cover;">
                      <div class="card-img-overlay">

                      </div>
                      @if ($creation->description)
                          <div class="card-body">
                              <p class="card-text">{{ $creation->description }}</p>
                          </div>
                      @endif

                  </div>
              </div>
          @endforeach
      </div>
  @endforeach --}}
  <livewire:photographers.album />
