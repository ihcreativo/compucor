@auth
    @extends('layouts.app')
    @section('titulo')
        Aministrador de Contenidos - Ishevi  
    @endsection
    @section('style')
     <script src="tinymce/tinymce.min.js"></script>
    {{--<script>
        tinymce.init({
            selector: 'textarea',  // change this value according to your HTML
            license_key: 'h7m5lzr9otax7ptu5ei9nu3eeyc5ouehfpteif54vos8geua'
        });
    </script> --}}
   
    
    @endsection
    @section('contenido')
        <div class="container-fluid"> 
            <dashboard_contenido path="{{route('login.index')}}"></dashboard>
        </div>
    @endsection
    @section('outcontent')
   
    @endsection
@endauth
