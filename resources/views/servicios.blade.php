@extends('pagina.app')
@section('style')
<style>
  .bg-servis{background-color:  #f1eded}
  .bg-negro{background-color: #000}
  .bg1{background-color: #e1e4e6; border-bottom:#dbd9d9 solid 1px}
  .bg2{background-color: #c6c7c8}
  .ihtitle{font-size: 11pt;letter-spacing: 1.3px; text-shadow: #d4dee4 1px 1px 3px}
</style>
@endsection
@section('title')
SERVICIOS - RECICOL
@endsection
@section('content')
<div class="d-sm-block d-lg-none">
    <img src="img/nuestros_servicios_sm.png" class="img-fluid" alt="">
</div>
<div class="d-none d-lg-block ">
    <img src="{{asset('img/nuestros_servicios.png')}}" class="img-fluid" alt="">
</div>



<div class="py-5 bg1">
    <div class="px-5">
        <h3>{{$serv['titulo']}}</h3>
        <div class="fs-5">
           {!!$serv['contenido']!!}

            <div class="row">
                <span class="d-none">{{$i = 1}}</span>
                @foreach ($hijos as $h)   
                <div class="col-4 @if($i % 2 == 0) bg2 @else bg1 @endif">
                    <div class="row px-2 py-2">
                        <div class="col-5">
                            <img src="{{ asset('/thum/'.$h->img) }}" width="100%">
                        </div>
                        <div class="col-7">
                            <h5>{{$h->titulo}}</h5>
                            <small class="">
                                {!! strip_tags($h->contenido) !!}
                            </small>
                        </div>
                    </div>
                </div>
                <span class="d-none">{{$i++}}</span>
                @endforeach
            </div>
    </div>
</div>



@endsection
