@extends('compucor.bonesHome')
@section('style')
<style>
	.thum{width: 200px !important}
</style>
@endsection
@section('title')
C O M P U C O R
@endsection
@section('content')
  <br>
  <br><br><br>
  <section id="features_" class="text-center">
      <img src="{{asset('assets/img/samsung.png')}}" id="im" alt="">
      <img src="{{asset('assets/img/lg.png')}}" id="im" alt="">
      <img src="{{asset('assets/img/acer.png')}}" id="im" alt="">
      <img src="{{asset('assets/img/dell.png')}}" id="im" alt="">
      <img src="{{asset('assets/img/asus.png')}}" id="im" alt="">
      <img src="{{asset('assets/img/apple.png')}}" id="im" alt="">
      <img src="{{asset('assets/img/hp.png')}}" id="im" alt="">
      <img src="{{asset('assets/img/lenovo.png')}}" id="im" alt="">
      <img src="{{asset('assets/img/intel.png')}}" id="im" alt="">
      <img src="{{asset('assets/img/amd.png')}}" id="im" alt="">
  </section>
  <section id="subscribe" class="pt-5">
    <div class="">
      <section class="container">
        <div class="title-box"><h1 class="block-title wow animated rollIn animated" style="visibility: visible; animation-name: rollIn;">
          <span class="bb-top-left"></span>
          <span class="bb-bottom-left"></span>
             SOBRE COMPUCOR
          <span class="bb-top-right"></span>
          <span class="bb-bottom-right"></span>
          </h1>
        </div>
        <section class="row">
          <div class="col-sm-10 col-sm-offset-1">
            <p class="susbcribe-text text-start">
            <strong>
            Computadores de Córdoba es una empresa monteriana </strong> con más de 20 años de experiencia en el sector tecnológico. Desde nuestros inicios, nos hemos enfocado en ser un aliado confiable para hogares, empresas e instituciones que buscan soluciones tecnológicas efectivas, accesibles y de alta calidad. Nuestra amplia trayectoria en el mercado local nos ha permitido consolidar un portafolio completo que incluye:.</p>
            <ul class="susbcribe-text text-start">
  
            <li>
              Computadores de escritorio y portátiles
            </li>
            <li>
              Tablets y dispositivos móviles
            </li>
            <li>
              Cámaras de seguridad y videovigilancia
            </li>
            <li>
              Routers y equipos de conectividad
            </li>
            <li>
              Accesorios tecnológicos y periféricos
            </li>
            <li>
              Asesoría personalizada y soporte técnico
            </li>
          </ul>
          <p class="susbcribe-text text-start">
            Nos diferenciamos por un trato cercano y honesto, una atención posventa responsable, y por mantenernos actualizados con las últimas tendencias en tecnología. Apostamos por el desarrollo digital de nuestra región y por construir relaciones duraderas con nuestros clientes. 
          </p>
          </div>
        </section>
      </section>
    </div>
    {{-- otra --}}
    <div class="" style="background-color: #f0f0f0;">
      <section class="container pt-5">
        <div class="title-box"><h1 class="block-title wow animated rollIn animated" style="visibility: visible; animation-name: rollIn;">
          <span class="bb-top-left"></span>
          <span class="bb-bottom-left"></span>
          NUESTRA MISION
          <span class="bb-top-right"></span>
          <span class="bb-bottom-right"></span>
          </h1>
        </div>
        
          <section class="row">
            <div class="col-sm-10 col-sm-offset-1">
              <p class="susbcribe-text text-start">
                <strong>En Computadores de Córdoba trabajamos con el compromiso</strong> 
                de brindar soluciones tecnológicas integrales que contribuyan al crecimiento personal, profesional y empresarial de nuestros clientes. <br><br>
                Nuestra misión es ofrecer productos y servicios tecnológicos de excelente calidad, con precios competitivos, atención personalizada y un firme compromiso con la satisfacción de quienes confían en nosotros. Buscamos acercar la tecnología a la vida cotidiana, haciendo que sea útil, confiable y accesible para todos.
              </p>
            </div>
          </section>
        
      </section>
    </div>
    {{-- otra 2 --}}
    <div class="pt-5">
      <section class="container">
        <div class="title-box"><h1 class="block-title wow animated rollIn animated" style="visibility: visible; animation-name: rollIn;">
          <span class="bb-top-left"></span>
          <span class="bb-bottom-left"></span>
          NUESTRA VISION
          <span class="bb-top-right"></span>
          <span class="bb-bottom-right"></span>
          </h1>
        </div>
        <section class="row">
          <div class="col-sm-10 col-sm-offset-1">
            <p class="susbcribe-text text-start">
            <strong>En Computadores de Córdoba trabajamos con el compromiso
             </strong> 
              Aspiramos a ser, para el año 2030, la empresa líder en el mercado tecnológico del departamento de Córdoba, reconocida por:
            </p>
            <ul class="susbcribe-text text-start">
            <li>Su excelencia en el servicio al cliente</li>
            <li>Su innovación constante en productos y procesos</li>
            <li>Su impacto positivo en la transformación digital de la región</li>
            <li>Su compromiso con la ética comercial, la formación continua y el desarrollo local</li>
          </ul>
          <p class="susbcribe-text text-start">
            Queremos seguir creciendo de la mano de nuestros clientes, adaptándonos a los cambios del entorno tecnológico y contribuyendo a una sociedad más conectada y eficiente.
          </p>
          </div>
        </section>
      </section>
    </div>

	</section>
@endsection
