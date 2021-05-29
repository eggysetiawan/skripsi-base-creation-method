<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-md-down-none">
        <img src="{{ asset('images/default1.jpg') }}" alt="Profile Picture" class="rounded-pill mt-3" width="85">
    </div>
    <div class="c-sidebar-brand d-md-down-none">
        {{ config('app.name', 'Laravel') }}
    </div>

    <ul class="c-sidebar-nav">

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link{{ request()->segment(1) == 'dashboard' ? ' c-active' : '' }}"
                href="{{ route('home') }}">
                <i class="cil-home"></i>&nbsp;&nbsp; Dashboard
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link{{ request()->segment(1) == 'profiles' ? ' c-active' : '' }}"
                href="{{ route('profiles.edit', auth()->user()->username) }}">
                <i class="cil-user"></i>&nbsp;&nbsp; User Profile
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('portfolios.index') }}">
                <i class="cil-library"></i>&nbsp;&nbsp; Portofolio
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('schedules.index') }}">
                <i class="cil-info"></i>&nbsp;&nbsp; Jadwal
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                <i class="cil-account-logout
              ">
                </i> &nbsp;&nbsp;
                {{ __('Logout') }}
            </a>
        </li>


    </ul>

</div>


<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
