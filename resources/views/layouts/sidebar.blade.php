<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-hide" id="sidebar">
    <div class="c-sidebar-brand d-md-down-none">
        <img src="{{ asset('images/default1.jpg') }}" alt="Profile Picture" class="rounded-circle mt-3" width="85">
    </div>
    <div class="c-sidebar-brand d-md-down-none">
        <a href="{{ route('profiles.show', auth()->user()->username) }}">{{ ucfirst(auth()->user()->name) }}</a>
    </div>

    <ul class="c-sidebar-nav">

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link{{ request()->segment(1) == 'dashboard' ? ' c-active' : '' }}"
                href="{{ route('home') }}">
                <i class="c-sidebar-nav-icon cil-home"></i>Dashboard
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link{{ request()->segment(1) == 'profiles' ? ' c-active' : '' }}"
                href="{{ route('profiles.edit', auth()->user()->username) }}">
                <i class="c-sidebar-nav-icon cil-user"></i>User Profile
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('portfolios.index') }}">
                <i class="c-sidebar-nav-icon cil-library"></i>Portofolio
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('schedules.index') }}">
                <i class="c-sidebar-nav-icon cil-info"></i>Jadwal
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('photographers.index') }}">
                <i class="c-sidebar-nav-icon cil-camera"></i>Fotografer
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('questions.index') }}">
                <i class="c-sidebar-nav-icon cil-clipboard"></i>Pertanyaan Kuisioner
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('questionnaires.index') }}">
                <i class="c-sidebar-nav-icon cil-clipboard"></i>Isi Kuisioner
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('criterias.index') }}">
                <i class="c-sidebar-nav-icon cil-list-rich"></i>Kriteria
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                <i class="c-sidebar-nav-icon cil-account-logout
              ">
                </i> {{ __('Logout') }}
            </a>
        </li>


    </ul>

</div>


<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
