<!-- Navbar -->
<nav class="sticky-lg-top navbar navbar-expand-lg ps-4 pe-4 mb-0 pt-1 pb-1 bg-dark">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Navbar brand -->
    <a class="navbar-brand pt-3 pb-3" href="{{route('login.index')}}">
      <img src="{{asset('img/logo_sm.png')}}" class="z-3 pt-0 pb-0" alt="..." height="70">
    </a>

    <!-- Toggle button -->
   <button
      data-mdb-collapse-init
      class="navbar-toggler"
      type="button"
      data-mdb-target="#navbarButtonsExample"
      aria-controls="navbarButtonsExample"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span></i>
    </button>
   

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarButtonsExample">
      <div class="w-100">
        <div class="input-group">
          <input class="form-control" type="text" placeholder="¿Qué estas buscando?">
          <span class="btn btn-danger"> Buscar</span>
        </div>
        <menu_pagina path="{{route('login.index')}}"></menu_pagina>
      </div>
      <!-- Left links -->
      {{-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#">Dashboard</a>
        </li>
      </ul> --}}
      <!-- Left links -->

      {{-- <div class="d-flex align-items-center">
        <button data-mdb-ripple-init type="button" class="btn btn-link px-3 me-2">
          Login
        </button>
        <button data-mdb-ripple-init type="button" class="btn btn-primary me-3">
          Sign up for free
        </button>
        <a
          data-mdb-ripple-init
          class="btn btn-dark px-3"
          href="https://github.com/mdbootstrap/mdb-ui-kit"
          role="button"
          ><i class="fab fa-github"></i
        ></a>
      </div> --}}
    </div>

    <a href="">
      <svg height="90px" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="_x33_75-whatsapp"><g><path d="M417.103,92.845C374.08,49.721,316.787,26.001,255.897,26.001    c-125.678,0-227.946,102.269-227.946,227.945c0,40.146,10.474,79.37,30.394,113.973l-32.343,118.08l120.852-31.728    c33.268,18.173,70.744,27.724,108.941,27.724h0.103c125.576,0,230.101-102.269,230.101-227.945    C485.998,193.161,460.125,135.97,417.103,92.845z" style="fill:#2CB742;"/><path d="M255.897,443.593c-34.089,0-67.46-9.138-96.518-26.388l-6.879-4.107l-71.67,18.789l19.099-69.924    l-4.518-7.187c-18.995-30.188-28.956-64.995-28.956-100.83c0-104.424,85.018-189.44,189.545-189.44    c50.619,0,98.158,19.714,133.892,55.548c35.731,35.835,57.705,83.376,57.603,133.996    C447.495,358.578,360.319,443.593,255.897,443.593z" style="fill:#FFFFFF;"/><path d="M359.807,301.691c-5.647-2.872-33.677-16.635-38.914-18.48c-5.237-1.952-9.035-2.875-12.834,2.875    s-14.683,18.48-18.073,22.384c-3.285,3.799-6.674,4.312-12.321,1.437c-33.473-16.735-55.445-29.878-77.521-67.768    c-5.853-10.062,5.854-9.344,16.736-31.11c1.85-3.801,0.926-7.086-0.514-9.961c-1.436-2.875-12.834-30.906-17.557-42.304    c-4.62-11.089-9.343-9.549-12.835-9.754c-3.285-0.206-7.086-0.206-10.883-0.206c-3.8,0-9.96,1.438-15.197,7.085    c-5.236,5.75-19.92,19.51-19.92,47.541s20.432,55.139,23.205,58.937c2.874,3.798,40.148,61.299,97.338,86.045    c36.144,15.607,50.314,16.94,68.386,14.271c10.985-1.643,33.679-13.759,38.401-27.107c4.723-13.347,4.723-24.743,3.285-27.105    C369.255,305.901,365.454,304.465,359.807,301.691z" style="fill:#2CB742;"/></g></g><g id="Layer_1"/></svg>
    </a>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->
{{-- <div class="d-none d-sm-none d-md-block">Este es un texto solo visible para escritorio</div>
<div class="d-block d-sm-block d-md-none">Este es un texto solo visible para móviles</div> --}}
<nav class="sticky-lg-top navbar navbar-expand-lg ps-4 pe-4 mb-0 pt-1 pb-1 bg-black d-none">
  <div class="row">
      <div class="col-3">
          <a class="navbar-brand pt-3 pb-3" href="{{route('login.index')}}">
            <img src="{{asset('img/logo_sm.png')}}" class="z-3 pt-0 pb-0" alt="..." height="60">
          </a>
      </div>
      <div class="col-6 bg-primary">
        <div class="input-group">
          <input class="form-control" type="text" placeholder="¿Qué estas buscando?">
          <span class="btn btn-danger"> Buscar</span>
        </div>
        <menu_pagina path="{{route('login.index')}}"></menu_pagina>
      </div>
      <div class="col-3">
        <a href="">
          <svg height="90px" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="_x33_75-whatsapp"><g><path d="M417.103,92.845C374.08,49.721,316.787,26.001,255.897,26.001    c-125.678,0-227.946,102.269-227.946,227.945c0,40.146,10.474,79.37,30.394,113.973l-32.343,118.08l120.852-31.728    c33.268,18.173,70.744,27.724,108.941,27.724h0.103c125.576,0,230.101-102.269,230.101-227.945    C485.998,193.161,460.125,135.97,417.103,92.845z" style="fill:#2CB742;"/><path d="M255.897,443.593c-34.089,0-67.46-9.138-96.518-26.388l-6.879-4.107l-71.67,18.789l19.099-69.924    l-4.518-7.187c-18.995-30.188-28.956-64.995-28.956-100.83c0-104.424,85.018-189.44,189.545-189.44    c50.619,0,98.158,19.714,133.892,55.548c35.731,35.835,57.705,83.376,57.603,133.996    C447.495,358.578,360.319,443.593,255.897,443.593z" style="fill:#FFFFFF;"/><path d="M359.807,301.691c-5.647-2.872-33.677-16.635-38.914-18.48c-5.237-1.952-9.035-2.875-12.834,2.875    s-14.683,18.48-18.073,22.384c-3.285,3.799-6.674,4.312-12.321,1.437c-33.473-16.735-55.445-29.878-77.521-67.768    c-5.853-10.062,5.854-9.344,16.736-31.11c1.85-3.801,0.926-7.086-0.514-9.961c-1.436-2.875-12.834-30.906-17.557-42.304    c-4.62-11.089-9.343-9.549-12.835-9.754c-3.285-0.206-7.086-0.206-10.883-0.206c-3.8,0-9.96,1.438-15.197,7.085    c-5.236,5.75-19.92,19.51-19.92,47.541s20.432,55.139,23.205,58.937c2.874,3.798,40.148,61.299,97.338,86.045    c36.144,15.607,50.314,16.94,68.386,14.271c10.985-1.643,33.679-13.759,38.401-27.107c4.723-13.347,4.723-24.743,3.285-27.105    C369.255,305.901,365.454,304.465,359.807,301.691z" style="fill:#2CB742;"/></g></g><g id="Layer_1"/></svg>
        </a>
      </div>
  </div>
</nav>
<nav class="sticky-lg-top navbar navbar-expand-lg ps-4 pe-4 mb-0 pt-1 pb-1 bg-dark d-none">
    <div class="container-fluid pb-0 pt-0">
      <div class="input-group">
        <a class="navbar-brand pt-3 pb-3" href="{{route('login.index')}}">
          <img src="{{asset('img/logo_sm.png')}}" class="z-3 pt-0 pb-0" alt="..." height="70">
        </a>
        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="w-100 bg-danger">
        <div class="input-group">
          <input class="form-control" type="text" placeholder="¿Qué estas buscando?">
          <span class="btn btn-danger"> Buscar</span>
        </div>
        <menu_pagina path="{{route('login.index')}}"></menu_pagina>
      </div>
      {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> --}}
      <a href="">
        <svg height="90px" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="_x33_75-whatsapp"><g><path d="M417.103,92.845C374.08,49.721,316.787,26.001,255.897,26.001    c-125.678,0-227.946,102.269-227.946,227.945c0,40.146,10.474,79.37,30.394,113.973l-32.343,118.08l120.852-31.728    c33.268,18.173,70.744,27.724,108.941,27.724h0.103c125.576,0,230.101-102.269,230.101-227.945    C485.998,193.161,460.125,135.97,417.103,92.845z" style="fill:#2CB742;"/><path d="M255.897,443.593c-34.089,0-67.46-9.138-96.518-26.388l-6.879-4.107l-71.67,18.789l19.099-69.924    l-4.518-7.187c-18.995-30.188-28.956-64.995-28.956-100.83c0-104.424,85.018-189.44,189.545-189.44    c50.619,0,98.158,19.714,133.892,55.548c35.731,35.835,57.705,83.376,57.603,133.996    C447.495,358.578,360.319,443.593,255.897,443.593z" style="fill:#FFFFFF;"/><path d="M359.807,301.691c-5.647-2.872-33.677-16.635-38.914-18.48c-5.237-1.952-9.035-2.875-12.834,2.875    s-14.683,18.48-18.073,22.384c-3.285,3.799-6.674,4.312-12.321,1.437c-33.473-16.735-55.445-29.878-77.521-67.768    c-5.853-10.062,5.854-9.344,16.736-31.11c1.85-3.801,0.926-7.086-0.514-9.961c-1.436-2.875-12.834-30.906-17.557-42.304    c-4.62-11.089-9.343-9.549-12.835-9.754c-3.285-0.206-7.086-0.206-10.883-0.206c-3.8,0-9.96,1.438-15.197,7.085    c-5.236,5.75-19.92,19.51-19.92,47.541s20.432,55.139,23.205,58.937c2.874,3.798,40.148,61.299,97.338,86.045    c36.144,15.607,50.314,16.94,68.386,14.271c10.985-1.643,33.679-13.759,38.401-27.107c4.723-13.347,4.723-24.743,3.285-27.105    C369.255,305.901,365.454,304.465,359.807,301.691z" style="fill:#2CB742;"/></g></g><g id="Layer_1"/></svg>
      </a>
      
      
    </div>
  </nav>