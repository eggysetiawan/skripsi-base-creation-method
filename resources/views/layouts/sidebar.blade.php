   <!-- Brand Logo -->
   <a href="{{ route('home') }}" class="brand-link">
       {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8"> --}}
       <span class="brand-text font-weight-light text-center">{{ config('app.name', 'KONG GRAPHY') }}</span>

   </a>

   <!-- Sidebar -->
   <div class="sidebar">
       <div class="text-center">
           <img src="{{ asset('images/logo.png') }}" alt="" class="img-fluid w-50">
       </div>
       <hr>
       <!-- Sidebar user (optional) -->
       <div class="user-panel mt-3 pb-3 mb-3 d-flex">
           @hasrole('superadmin|photographer')
           <div class="image">
          <img src="@if (auth()->user()->getFirstMediaUrl('displaypicture')) {{ asset(
    auth()->user()->getFirstMediaUrl('displaypicture'),
) }} @else
               {{ asset('images/default.png') }} @endif" class="img-circle elevation-2"
               alt="User Image">
           </div>
           @endhasrole
           <div class="info">
           <a href="@hasrole('photographer') {{ route('profiles.show', auth()->user()->username) }} @else # @endhasrole"
                   class="d-block">{{ auth()->user()->name }}
               </a>
           </div>
       </div>

       <!-- SidebarSearch Form -->
       {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div> --}}

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
                   <a href="{{ route('questionnaires.index') }}"
                       class="nav-link{{ request()->segment(1) == 'questionnaires' ? ' active' : '' }}">
                       <i class="nav-icon fas fa-clipboard-check"></i>
                       <p>
                           Isi Kuisioner
                       </p>
                   </a>
               </li>

               @endhasrole
               @hasrole('customer|admin|superadmin')
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
                   <a href="{{ route('photos.index') }}"
                       class="nav-link{{ request()->segment(1) == 'photos' ? ' active' : '' }}">
                       <i class="nav-icon fab fa-envira"></i>
                       <p>
                           Gallery
                       </p>
                   </a>
               </li>
               @endhasrole

               @hasrole('superadmin|admin')
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
                   <a href="{{ route('schedules.index') }}"
                       class="nav-link{{ request()->segment(1) == 'schedules' ? ' active' : '' }}">
                       <i class="nav-icon fas fa-calendar-alt"></i>
                       <p>
                           Jadwal
                       </p>
                   </a>
               </li>

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

   </div>
