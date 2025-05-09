@auth
    @extends('layouts.app')
    @section('titulo')
        Aministrador de Banners - Ishevi  
    @endsection
    @section('style')
    <script src="tinymce/tinymce.min.js"></script>
   
    
    @endsection
    @section('contenido')
        <div class="container-fluid"> 
            <dashboard_banners path="{{route('login.index')}}"></dashboard_banners>
        </div>
    @endsection
    @section('outcontent')
   
    @endsection
@endauth
