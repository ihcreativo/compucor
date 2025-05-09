@extends('pagina.app')
@section('style')
<style>
  li{list-style: none;}
  li #sp{display: block; font-size: 13pt; padding-top: 20px; font-weight: bold;}

  .text-justify{text-align:justify !important;}

  .animar{ transition:0.5s;}
  .animar:hover{ transform: scale(1.05);}
  .animar img{border-radius: 10px; padding: 5px; box-shadow: #18d4ca 1px 1px 3px;}
</style>

@endsection
@section('title')
SOBRE RECICOL R&C
@endsection

@section('content')
<div class="d-sm-block d-lg-none">
  <img src="img/sobre_nosotros_sm.png" class="img-fluid" alt="">
</div>
<div class="d-none d-lg-block">
  {{-- <img src="img/corporativo.jpg" width="100%" alt=""> --}}
  <img src="img/sobre_nosotros.png" class="img-fluid" alt="">
</div>
<span class="d-none">
  {{$i = 1}}
</span>
@foreach ($contenido as $c)
@if($i % 2 == 0)<div class="animar bg1"> @else<div class="animar">@endif
  <div class="container mt-2 pt-5 pb-5">
    <div class="row mb-5">
      <div class="col-lg-5 col-sm-12">
        <img src="/thum/{{$c->img}}"  class="mx-auto d-block" width="80%" alt="">
      </div>
      <div class="col-lg-7 col-sm-12">
        <h3 class="d-none d-lg-block ps-3">{{$c->titulo}}</h3> 
        <div class="fs-5 text-justify p-3">
          {!! nl2br($c->contenido)!!}
        </div>
      </div>
    </div>
  </div>
</div>
<div class="d-none">
  {{$i++}}
</div>
@endforeach


{{-- @foreach ($allUser as $u)
<tr>
    <td>{{ ++$i }}</td>
    <td class="text-center">{{$u->username}}</td>
    <td class="df-ajuste">{{$u->firts_name}} {{$u->last_name}} --}}


{{-- <div class="bg1 animar">
  <div class="container mt-2 mt-2 pt-5 pb-5">
    <div class="row mb-5">
      <h3 class="d-lg-none text-center pb-3">NUESTRA MISIÓN</h3>
      <div class="col-lg-5 col-sm-12">
        <img  src="img/xmision_.png" class="mx-auto d-block" width="80%" alt="">
      </div>
      <div class="col-lg-7 col-sm-12">
        <h3 class="d-sm-none d-md-block"></h3>
        
        <h3 class="d-none d-lg-block ps-3">NUESTRA MISIÓN</h3> 
        <div class="fs-5 text-justify p-3">
          RECICOL R & C SAS  es  una empresa dedicada a la recolección y procesamiento de materiales reciclables, para el alargamiento de su vida útil a través de una red logística de servicio y comercialización, contamos con un talento humano eficiente y responsable que garantiza la satisfacción de nuestros clientes y proveedores.
        </div>
      </div>
    </div>
  </div>
</div>
<div class="animar">
  <div class="container mt-2 pt-5 pb-5">
    <div class="row mb-5">
      <h3 class="d-lg-none text-center pb-3">NUESTRA VISIÓN</h3>
      <div class="col-lg-5 col-sm-12">
        <img  src="img/vision.jpg" class="mx-auto d-block" width="80%" alt="">
      </div>
      <div class="col-lg-7 col-sm-12">
        <h3 class="d-none d-lg-block ps-3">NUESTRA VISIÓN</h3> 
        <div class="fs-5 p-3 text-justify">
          Ser reconocidos en Colombia como una empresa líder en su dedicación a la recolección de materiales reciclables, pioneros en la formación de una gran cultura ecológica para el cuidado del medio ambiente bajo un modelo de negocio inclusivo y sostenible, sustentado en una estructura organizacional sólida, que genere una gran alianza con nuestros clientes y proveedores gracias a relaciones de confianza, credibilidad y excelencia en el servicio, siempre buscando un mutuo beneficio.
        </div>
      </div>
    </div>
  </div>
</div>
<div class="bg1 animar">
  <div class="container mt-2 mt-2 pt-5 pb-5">
    <div class="row mb-5">
      <h3 class="d-lg-none text-center pb-3">NUESTROS VALORES</h3>
      <div class="col-lg-5 col-sm-12">
        <img  src="img/valores.png" class="mx-auto d-block p-3" width="80%" alt="">
      </div>
      <div class="col-lg-7 col-sm-12">
        <h3 class="d-none d-lg-block ps-3">NUESTROS VALORES</h3> 
        <div class="fs-5 p-3 text-justify">
          <li>
            <span id="sp">
              HONESTIDAD
            </span>
             Los principios de verdad, integridad, justicia, transparencia y dialogo son la base de todas nuestras actuaciones.
          </li>
          <li>
            <span id="sp">LIDERAZGO</span>
            La innovación y anticipación nos permite ser una empresa referente que marca tendencias en nuestra actividad comercial.
          </li>
          <li>
            <span id="sp">CUIDADO DE LAS PERSONAS</span>
            Creemos en la integración e igualdad de oportunidades.
          </li>
          <li>
            <span id="sp">ORIENTACION AL PROVEEDOR</span>
            Acompañar y apoyar al proveedor en su crecimiento y conseguir su satisfacción es la base de nuestro enfoque a la excelencia.
          </li>
          <li>
            <span id="sp">COMPROMISO SOCIO-AMBIENTAL</span>
            Brindar respaldo a instituciones y Asociaciones de recicladores de oficio que contribuyen a un mejoramiento ambiental para el cuidado de la sociedad.
          </li>
          <li>
            <span id="sp" >SEGURIDAD EN EL TRABAJO</span>
            Nuestra mejor inversión en la prevención.
          </li>
       
        </div>
      </div>
    </div>
  </div>
</div> --}}


@endsection
