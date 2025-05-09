
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('img/favicon.ico')}}" type="image/x-icon" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    {{-- @viteReactRefresh --}}
    {{-- @vite('resources/js/app.js') --}}
    <!-- Scripts -->
    {{-- Desploy  --}}
    {{-- <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/app-74528bec.css">
    <link rel="preload" as="style" href="/build/assets/app-74528bec.css" />
    <link rel="modulepreload" href="/build/assets/app-64b583ba.js" />
    <link rel="stylesheet" href="/build/assets/app-74528bec.css" />
    <script type="module" src="/build/assets/app-64b583ba.js"></script>  --}}
    {{-- fin desploy --}}
    {{-- local --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    {{-- fin local  --}}
    <style>
        .lk {color:  rgb(16, 16, 16); letter-spacing: 1px !important; text-shadow: rgb(110, 107, 107) 1px 1px 1px; }
        .lk:hover{
            border-bottom: #ffa710 solid 1px 1px !important;
        }
        .bg1{background-color: #CCCCCC;}
        a {text-decoration: none !important;}
        footer a{color: #fff; letter-spacing: 1px; display: block;margin-bottom: 4px; margin-left: 5px; }
        .ihV{text-align: center}
        .ihV i{margin-right: 7%;}
        .ihRight{font-size: 12px; letter-spacing: 1px}
    </style>
    @yield('style') 
    
</head>
<body>
    <div id="app">
        @include('pagina.header')
        <main>
            @yield('content')
        </main>
    </div>
    {{-- pie de pagina --}}
    <footer class="bg-dark text-white p-5 pb-0">
          <div class="row">
            <div class="col-lg-4 col-sm-12">
                <div class="row">
                    <div class="col-lg-4 col-sm-12 text-center">
                        <img src="{{asset('img/l_white_.png')}}" width="80" alt="">
                    </div>
                    <div class="col-lg-8 d-none d-lg-block">
                        <a href="#">NUESTROS SERVICIOS</a>
                        <a href="#"> SOBRE NOSOTROS</a>
                        <a href="#">CONTACTANOS</a>
                        <a href="#">PQRS</a>
                    </div>
                </div>
        
            </div>
            <div class="col-lg-5 col-sm-12  text-sm-center text-center text-md-start text-start">
              <h5 class="">&nbsp;&nbsp;&nbsp;&nbsp;SEDE PRINCIPAL</h5>
              <p><i class="bi bi-signpost"></i> &nbsp;Calle 29 # 41 - 64 Barrio Villa Caribe 
                <br> &nbsp;&nbsp;&nbsp;&nbsp; Montería - Córdoba  &nbsp;<img src="{{asset('img/bandera.png')}}"></p>
              <p><i class="bi bi-envelope"></i> &nbsp;info@recicol.com</p>
              <p> <i class="bi bi-telephone"></i> &nbsp;Teléfono:  3156493385</p>
              <p>
                <i class="bi bi-calendar-week"></i> &nbsp; HORARIO DE ATENCION <br>  
                Lunes a Viernes ( 7:00AM  -  12:00 PM Y 2:00 A 5:30 PM )
                <br>
                Sabados : ( 7:00 AM A 12:00 PM )
              </p>
            </div>
            <div class="col-lg-3">
              <span class="d-block text-center ">
                  SIGUENOS EN NUESTRAS REDES SOCIALES
              </span>
              <div class="fs-2 ihV mt-5">
                <i class="bi bi-whatsapp"></i>
                <i class="bi bi-youtube"></i>
                <i class="bi bi-instagram"></i>
              </div>
            </div>
            <div class="col-lg-8 mt-4 pb-2 ihRight">
                <i class="bi bi-c-circle"></i> 2024 RECICLAJES DE COLOMBIA R & C SAS - RECICOL.COM <br>
            </div>
            <div class="col-lg-4   mt-4 pb-2 text-end" style="font-style: italic; font-size:11px">
                Power by &nbsp; <img src="{{asset('img/ih.png')}}">&nbsp;ishevi.com
            </div>
          </div>
      </footer>
</body>
</html>
