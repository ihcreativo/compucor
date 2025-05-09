<li class="menu {{ ! Route::is('dashboard') ?: 'active'}}">
    <a href="{{route('dashboard')}}" aria-expanded="false" class="dropdown-toggle">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
            <span>DashBoard</span>
        </div>
    </a>
</li>
<li class="menu {{! Route::is('contenidos') ?: 'active'}}">
     <a href="{{route('contenidos')}}" aria-expanded="false" class="dropdown-toggle">
        <div class="">
            {{-- <i class="fa-solid fa-box-open fs-6"></i> --}}
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
            <span>Contenidos</span>
        </div>
    </a>
</li>
<li class="menu {{! Route::is('banners') ?: 'active'}}">
    <a href="{{route('banners')}}" aria-expanded="false" class="dropdown-toggle">
       <div class="">
        <!-- https://feathericons.dev/?search=image&iconset=feather -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="main-grid-item-icon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                <rect height="18" rx="2" ry="2" width="18" x="3" y="3" />
                <circle cx="8.5" cy="8.5" r="1.5" />
                <polyline points="21 15 16 10 5 21" />
        </svg>
  
        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg> --}}
        <span>Banners</span>
       </div>
   </a>
</li> 
{{-- <li class="menu {{! Route::is('contactos-admin') ?: 'active'}}">
    <a href="{{route('contactos-admin')}}" aria-expanded="false" class="dropdown-toggle">
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
            <span>Contactos</span>
        </div>
    </a>
</li>    --}}
{{-- <li class="menu {{! Route::is('galerias-admin') ?: 'active'}}">
    <a href="" aria-expanded="false" class="dropdown-toggle">
       <div class="{{route('galerias-admin')}}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
            <span>Galeria</span>
       </div>
   </a>
</li>  --}}
{{-- <li class="menu {{ ! Route::is('users','usuariosAdd,','usuarioX')?: 'badge-light-primary rounded-2 mx-3'}}">
    <a href="{{route('users')}}" aria-expanded="false" class="dropdown-toggle">
        <div class="">
            <img src="{{ asset('img/ico/users.png')}}" width="24px">
            <span>Usuarios</span>
        </div>
    </a>
</li> --}}


{{-- <li class="menu {{ ! Route::is('dashboard') ?: 'badge-light-primary rounded-2 mx-3'}}">
    <a href="{{route('dashboard')}}" aria-expanded="false" class="dropdown-toggle">
        <div class="">
            <img src="{{ asset('img/ico/home.png')}}" width="24px">
            <span>Inicio</span>
        </div>
    </a>
</li> --}}
<li class="menu {{ ! Route::is('setting') ?: 'active text-white'}}">
    <a href="{{route('setting')}}" aria-expanded="false" class="dropdown-toggle">
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="main-grid-item-icon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                <circle cx="12" cy="12" r="3" />
                <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z" />
            </svg>
             <span>Configuración</span>
        </div>
    </a>
</li>
