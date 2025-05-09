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
    <img src="img/nuestros_servicios.png" class="img-fluid" alt="">
</div>

<div class="py-5 mt-0 bg1 px-5">
    <div class="">
        <h3>COMERCIALIZACIÓN DE MATERIALES RECICLABLES</h3>
        <div class="fs-5 text-justify">
            Comercializamos toda clase de materiales reciclables como archivos, cartón, revistas, periódicos, plásticos, materiales ferrosos, materiales no ferrosos y baterías
            con pequeños emprendedores del gremio y con asociaciones de recicladores de oficio.
            <br><br>
    
            Compramos materiales como:
            <div class="row">
                <div class="col-lg-4 col-sm-12 bg1">
                    <div class="row px-2 py-2">
                        <div class="col-5">
                            <img src="img/chatarra_.jpg" width="100%">
                        </div>
                        <div class="col-7">
                            <h5>CHATARRA</h5>
                            <small>
                                Hierro, residuos de taller, estructuras, alambres, piezas de maquinarias, residuos de construcción
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 bg2">
                    <div class="row px-2 py-2">
                        <div class="col-5">
                            <img src="img/carton_.jpg" class="card-img-top">
                        </div>
                        <div class="col-7">
                            <h5>CARTON</h5>
                            <small>
                                Cajas, cartones, Carton currugado, no se recibe material mojado 
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 bg1">
                    <div class="row px-2 py-2">
                        <div class="col-5">
                            <img src="img/archivo.png" class="card-img-top">
                        </div>
                        <div class="col-7">
                            <h5>ARCHIVOS</h5>
                            <small>
                                Cuadernos, folios, Archivos, Papel y Revistas entre otros...
                            </small>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-sm-12 bg2">
                    <div class="row px-2 py-2">
                        <div class="col-5">
                            <img src="img/pastas.jpg" width="100%">
                        </div>
                        <div class="col-7">
                            <h5>PLASTICOS - PASTAS</h5>
                            <small>
                                Sillas plásticas, baldes, tazas, elementos de aseo y cocina, envases de cloro, envases de aceites, canastas
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 bg1">
                    <div class="row px-2 py-2">
                        <div class="col-5">
                            <img src="img/pet.jpg" class="card-img-top">
                        </div>
                        <div class="col-7">
                            <h5>BOTELLAS PET</h5>
                            <small>
                                Botellas bebidas y detergentes, se recibe solo transparentes.
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 bg2">
                    <div class="row px-2 py-2">
                        <div class="col-5">
                            <img src="img/aluminio_.jpg" class="card-img-top">
                        </div>
                        <div class="col-7">
                            <h5>ALUMINIO</h5>
                            <small>
                                Latas de bebidas, perfilería de ventanas, ollas, bandas de frenos, envases de aerosoles, cableado de aluminio.
                            </small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12 bg1">
                    <div class="row px-2 py-2">
                        <div class="col-5">
                            <img src="img/cobre.jpg" width="100%">
                        </div>
                        <div class="col-7">
                            <h5>COBRE</h5>
                            <small>
                                Cableado, tuberías, racores, conectores eléctricos, bobinados
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 bg2">
                    <div class="row px-2 py-2">
                        <div class="col-5">
                            <img src="img/acero.jpg" class="card-img-top">
                        </div>
                        <div class="col-7">
                            <h5>BRONCE</h5>
                            <small>
                                Racores, plomería, llaves, candados, conectores eléctricos. 
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 bg1">
                    <div class="row px-2 py-2">
                        <div class="col-5">
                            <img src="img/baterias_.jpg" class="card-img-top">
                        </div>
                        <div class="col-7">
                            <h5>BATERIAS</h5>
                            <small>
                                Del grupo 0.7 al grupo 5, scrap moto, scrap tierra, scrap ups.
                            </small>
                        </div>
                    </div>
                </div>
            </div>







            <div class="card-group d-none">
                <div class="card">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Chatarra</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                <div class="card">
                    <img src="img/archivo.png" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Archivos</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                <div class="card">
                  <img src="..." class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Aluminios</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
                <div class="card">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Revistas</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                <div class="card">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Periódicos</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                <div class="card">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Carton</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                <div class="card">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Plasticos</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>

            </div>
            <ul class="d-none">
                <li>
                  Archivos 
                </li>
                <li>Revistas</li>
                <li>Periódicos</li>
                <li>Cartón</li>
                <li>Plásticos ( Pastas, Rimax, Canastas, Bolsas plstaticas, PET-embases )</li>
                <li>Materiales ferrosos (chatarra, Hierro gris)</li>
                <li>Materiales no ferrosos (acero, aluminios, antimonios, cobre, bronce, plomo, radiadores )</li>
                <li>Baterias ( del grupo 0.7 al grupo 5, scrap moto, scrap tierra, scrap ups)</li>
            </ul>
        </div>
    </div>
</div>



@endsection
