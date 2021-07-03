<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item">
            <a href="{{ route('home') }}"
                class="nav-link{{ request()->segment(1) == 'dashboard' ? ' active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>

        @hasrole('superadmin|photographer')
        <li class="nav-item">
            <a href="{{ route('profiles.edit', auth()->user()->username) }}"
                class="nav-link{{ request()->segment(1) == 'profiles' ? ' active' : '' }}">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    User Profile
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('portfolios.index') }}"
                class="nav-link{{ request()->segment(1) == 'portfolios' ? ' active' : '' }}">
                <i class="nav-icon fas fa-braille"></i>
                <p>
                    Portfolio
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('schedules.index') }}"
                class="nav-link{{ request()->segment(1) == 'schedules' ? ' active' : '' }}">
                <i class="nav-icon fas fa-calendar-alt"></i>
                <p>
                    Jadwal
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('questionnaires.index') }}"
                class="nav-link{{ request()->segment(1) == 'questionnaires' ? ' active' : '' }}">
                <i class="nav-icon fas fa-clipboard-check"></i>
                <p>
                    Isi Kuisioner
                </p>
            </a>
        </li>

        @endhasrole

        @hasrole('superadmin|admin')
        <li class="nav-item">
            <a href="{{ route('photographers.index') }}"
                class="nav-link{{ request()->segment(1) == 'photographers' ? ' active' : '' }}">
                <i class="nav-icon fas fa-camera-retro"></i>
                <p>
                    Fotografer
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('questions.index') }}"
                class="nav-link{{ request()->segment(1) == 'questions' ? ' active' : '' }}">
                <i class="nav-icon fas fa-clipboard-list"></i>
                <p>
                    Pertanyaan Kuisioner
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('criterias.index') }}"
                class="nav-link{{ request()->segment(1) == 'criterias' ? ' active' : '' }}">
                <i class="nav-icon fas fa-dice-five"></i>
                <p>
                    Kriteria
                </p>
            </a>
        </li>
        @endhasrole

        <li class="nav-item">
            <a href="{{ route('about') }}"
                class="nav-link{{ request()->segment(1) == 'about' ? ' active' : '' }}">
                <i class="nav-icon fas fa-info"></i>
                <p>
                    About
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                    Logout
                </p>
            </a>
        </li>

    </ul>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</nav>
