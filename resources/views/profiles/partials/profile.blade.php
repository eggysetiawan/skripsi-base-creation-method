<div class="row justify-content-center">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header"><i class="fa fa-align-justify"></i> Profil Photografer</div>
            <div class="card-body">
                <div class="text-center">
                    <img src="{{ asset('images/default1.jpg') }}"
                        class="rounded rounded-circle img-thumbnail img-fluid" alt="..." width="170">
                    <div>
                        <h5 class="mt-2">{{ $user->name }}</h5>
                    </div>
                </div>
                <hr>

                <div class="list-group" id="list-tab" role="tablist">

                    @if ($user->username == auth()->user()->name)
                        <a href="{{ route('creations.create') }}" class="card-text align-items-center">Tambah Foto</a>
                        <hr>
                    @endif

                    <a class="list-group-item list-group-item-action active" id="list-profile-list" data-toggle="list"
                        href="#list-profile" role="tab" aria-controls="profile">Project</a>
                    <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list"
                        href="#list-messages" role="tab" aria-controls="messages">Album</a>
                </div>

            </div>
        </div>
    </div>

    <div class="col-lg-9">
        <div class="tab-content" id="nav-tabContent">

            <div class="tab-pane fade show active" id="list-profile" role="tabpanel"
                aria-labelledby="list-profile-list">
                <div class="row justify-content-start">
                    @foreach ($projects as $project)
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img src="{{ asset($project->getFirstMediaUrl('creation')) }}"
                                    class="card-img-top  img-fluid" alt="{{ $project->slug }}" height="200"
                                    style="object-fit: cover;">

                                <div class="card-body">
                                    <a class="card-text stretched-link display-4"
                                        href="{{ route('creations.show', $project->slug) }}">
                                        <blockquote class="blockquote text-center">
                                            <p class="mb-0">{{ Str::limit($project->description, 25, '...') }}</p>
                                            <footer class="blockquote-footer">
                                                {{ $project->title }}
                                            </footer>
                                        </blockquote>
                                    </a>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                @include('photographers.album')
            </div>
        </div>


    </div>
</div>
