<div class="row justify-content-center">
    <div class="col-md-12">
        <x-alert />
    </div>
</div>

<div class="row justify-content-center mb-4">
    <a href="{{ route('creations.create') }}" class="text-center">Tambah Album</a>
</div>
<div class="row justify-content-center">

    <div class="col-lg-3">
        <div class="card">
            <div class="card-header"><i class="fa fa-align-justify"></i> Profil Photografer</div>
            <div class="card-body">
                <div class="text-center">
                <img src="@if ($user->getFirstMediaUrl('displaypicture')) {{ asset($user->getFirstMediaUrl('displaypicture')) }} @else
                    {{ asset('images/default.png') }} @endif"
                    class="rounded rounded-circle img-thumbnail img-fluid" alt="..." width="170">
                    <div>
                        <h5 class="mt-2">{{ $user->name }}</h5>
                    </div>
                </div>
                <hr>

                <div class="list-group" id="list-tab" role="tablist">
                    <p>{{ $user->bio }}.</p>
                    <hr>

                    @if ($user->username == auth()->user()->name || auth()->user()->username == 'superadmin')
                        <a href="{{ route('creations.create') }}" class="card-text text-center">Tambah
                            Album</a>
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
                        <div class="col-md-4" style="margin-right: 100px">
                            <div class="card" style="width: 18rem;height:25rem">
                                <img src="{{ asset($project->getFirstMediaUrl('creation')) }}"
                                    class="card-img-top img-fluid" alt="{{ $project->slug }}" height="200"
                                    style="object-fit: cover;">
                                @if ($project->user_id == auth()->id())
                                    <div class="card-img-overlay text-right pt-0 pr-0">
                                        <a href="{{ route('creations.edit', $project->id) }}">Edit</a>
                                        <form class="form-inline d-inline"
                                            action="{{ route('creations.destroy', $project->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-link" type="submit"
                                                onclick="return confirm('Are you sure want to delete this album?')">Hapus</button>
                                        </form>
                                    </div>
                                @endif

                                <div class="card-body">
                                    <a class="card-text display-4" href="#!">
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
