
<template>
    <div :class="status">

        <div v-if="producto[0] != undefined" class="container my-5">
            <span class="text-uppercase espacio d-block mb-5">
            
                <a :href="path"> Inicio </a> / <a :href="path+'/categoria/'+producto[0].slug">{{ producto[0].categoria }}</a> /  {{ producto[0].producto }}
            </span>
            <div class="row py-0">
                <div class="col-sm-12 col-lg-6">              
                    <img :src="path+'/tienda/productos/'+img_activo" class="rounded-5 " width="90%" alt="">

                    <div  class=" m-5">
                        <img v-for="(img, i) in thum" :key="i"  @click="img_activo = img.img" :src="path+'/tienda/productos/thum/'+img.img" width="20%" :class="img.img != img_activo? 'rounded-3 opacity-25 raton pe-4 pb-4':'rounded-3 pe-4 pb-4'" alt="">
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6 h-75">
                    <h1 class="text-uppercase">
                        {{ producto[0].producto }}
                    </h1>
                    <span>
                        Marca : {{ producto[0].marca }}
                    </span><br>
                    <span :class="producto[0].oferta > 0?'rojo':'text-success'"> 
                        <i class="fa-solid fa-dollar-sign"></i>
                        $ {{ miles(producto[0].precio) }} 
                    </span>
                    <span :class="producto[0].oferta > 0?'verde ':'d-none'">
                        <br>
                        <i class="fa-solid fa-dollar-sign"></i>
                        $ {{ miles(producto[0].oferta) }}
                    </span>
                    <br>
                    <div class="btn btn-success mt-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                            <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
                        </svg> 
                        <span class="fs-3" @click="waap = 'on'">
                            SOLICITAR ASESORIA
                        </span>
                    </div>
                    <div class="ms-0" >
                        <h3 class="text-uppercase">Informacion del Producto</h3>
                        <ul class="nav nav-tabs">
                          <li class="nav-item">
                            <a :class="opc === 'especificaciones'? 'nav-link active ps-3 ms-0':'nav-link'" aria-current="page" @click="opc = 'especificaciones'">Especificaciones</a>
                          </li>
                          <li class="nav-item">
                            <a :class="opc === 'Caracteristicas'? 'nav-link active':'nav-link'" aria-current="page" @click="opc = 'Caracteristicas'">Caracteristicas</a>
                          </li>
                          <li class="nav-item">
                            <a :class="opc === 'Terminos'? 'nav-link active':'nav-link'" aria-current="page" @click="opc = 'Terminos'">Terminos</a>
                          </li>
                        </ul>
                    </div>

                    <div :class="opc === 'especificaciones'? 'border border-top-0 p-4':'d-none'">
                        <span v-html="producto[0].especificaciones"></span>
                    </div>
                    <div :class="opc === 'Caracteristicas'? 'border border-top-0 p-4':'d-none'">
                        <span v-html="producto[0].caracteristicas"></span>
                    </div>
                    <div :class="opc === 'Terminos'? 'border border-top-0 p-4':'d-none'">
                        <span v-html=" producto[0].terminos"></span>
                        
                    </div>
                </div>
            </div>
            <nav :class="waap == 'on'?'navbar fixed-bottom navbar-light bg-light':'d-none'">
                <div class="chat">
                    <div class="chat_title fs-2 fw-3 py-4">
                        Compucor atencion al Cliente...!&nbsp;&nbsp;
                    <span class="text-danger fw-bold raton" @click="waap='off'">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                            </svg>
                        </span>
                    </div>
                    <div class="chat_body fs-2 text-dark mt-5">
                        Hola ! 
                        Estoy Interesado en <br> 
                        {{ producto[0].producto }}
                    </div>
                    <div class="chat_footer text-end my-5">
                        <a @click="waap='off'" target="_blank" :href="'https://wa.me/573004154893?text=Hola! Estoy interesado en '+producto[0].producto+ '--'+'https://compucor.com.co/tienda/'+producto[0].id+'/'+producto[0].p_slug+''">
                            <span class="waap fs-3 fw-bold">
                                Habla con un Asesor &nbsp;
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
      <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z"/>
    </svg>
                            </span>
                        </a>
                    </div>
                </div>
            </nav>

        </div>
        <!-- modal movimiento-->
         <div class="modal fade modal-lg" id="ihcreativo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content fondo p-0">
                    <div class="text-danger text-end m-1  pe-3 pt-3" data-bs-dismiss="modal" aria-label="Close">
                        <span class="badge badge-danger m-0">
                            <i class="fa-solid fa-x"></i>
                        </span>
                    </div>
                    <div class="modal-body p-0 px-3 pb-3 ">
                        <h4 class="text-uppercase">sasasas </h4>
                        <!-- {{ this.dataModal }} -->
                         <div class="form">
                            <div class="input-group mb-0">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fa-solid fa-icons"></i>
                                </span>
                                <input class="form-control" id="imagenP" type="file" >
                                <div class="input-group-text btn btn-primary fs-6">
                                    CARGAR
                                </div>  
                            </div>
                             <div class="row">

                                <div class="col-3 card p-2 mt-4 text-center">
                                    IMAGEN PRINCIPAL
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>     
            </div>
        </div>
        <!-- Fin modal Movimiento -->
       
    </div>
</template>

<script>
import axios from 'axios';

export default {
    props:{
        path:{type:String, default:''},
        id : {type:String, default:'0'},
    },

    data() {
        return {
            status: 'ini',
            state: {'INI': 'ini', 'LOADING': 'loading', 'LOADED': 'loaded', 'FAILED': 'failed'},
            producto:[],
            thum:[],
            img_activo : '',
            opc: 'especificaciones',
            waap:'off'
        }
    },
    methods:{
        solicitar: function(){
            //$('#ihcreativo').modal('show');
             $('#ihcreativo').appendTo("body").modal('show');
        },
        isEmpty: function(arg){
            return [undefined, null, ''].includes(arg);
        },
        miles: function(num){
            if(this.isEmpty(num)){
                return 0;
            }
            return num.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
        },

        
        load_producto: function(){
            this.status = this.state.LOADING; 
            let fields =  new FormData();
            fields.append('id',this.id);
            axios.post(this.path+'/productos_view', fields).then(res => {
                this.producto = res.data;
                console.log(this.producto);
                this.img_activo = this.producto[0].img;
                this.load_imagenes();
                this.status = this.state.LOADED;
                
            }).catch(err => {
                console.log(err);
                this.status = this.state.FAILED;
            });
        },

        load_imagenes: function(){
            this.status = this.state.LOADING; 
            let fields =  new FormData();
            fields.append('id',this.id);
            axios.post(this.path+'/produto_imagenes', fields).then(res => {
                this.thum = res.data;
                this.status = this.state.LOADED;
                console.log('---ih')
                console.log(this.thum);
                console.log('va');
                
            }).catch(err => {
                console.log(err);
                this.status = this.state.FAILED;
            });
        },
        ordenarContenido: function(dato){
            let listado = [];
            let list = dato.filter(elm => elm.hijo === 'no');
            let xx = list.map(gen => {
                let x = [];
                listado.push(gen)
                dato.forEach(esp => {
                    if (esp.hijo == 'si') {
                        if (esp.id_padre === gen.id) {
                            x.push(esp);
                            listado.push(esp)
                        }
                    }
                });
                gen.hijos = x;
                return gen;
            });
            // console.log(list);
            // console.log('lista')
            // console.log(list);
            // console.log('fin lista')
            return listado;
        },

       
        loadOpcion: function(arg){
            this.opcionActive = arg;
            $('#ModalOpcion').modal('show');
        },

    },
    mounted() {      
       this.load_producto();
    }
}
</script>
<style scoped>
  .colmin {width: 1%; white-space: nowrap; text-align: center}
  .loading {opacity: .45; pointer-events: none; user-select: none}
  .bg-1{background: #2cd7ea; border:none}
  .bg-2{background: #01F9daAE; border:none}
  .fija{position: absolute; z-index: 1;width: 50px; margin-top: 30%;}
  .fija2{margin-left:87% ; position: absolute; z-index: 1;width: 50px; margin-top: 30%; }
  .ih_1{background: rgb(3, 3, 13); background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);}
  .ih_2{background: rgb(162,38,3);background: linear-gradient(90deg, rgba(162,38,3,1) 0%, rgba(235,170,134,1) 100%, rgba(0,212,255,1) 100%);}
  .ih_3{background: rgb(245,189,60);background: linear-gradient(90deg, rgba(245,189,60,1) 0%, rgba(249,246,60,1) 100%);}
  .ih_4{background: rgb(223,187,226);background: linear-gradient(0deg, rgba(223,187,226,1) 2%, rgba(136,4,109,1) 100%);}
  .ih_5{background: rgb(246,250,246);background: linear-gradient(90deg, rgba(246,250,246,1) 0%, rgba(60,249,92,1) 100%);}
  .ih_6{background: rgb(60,244,245);background: linear-gradient(90deg, rgba(60,244,245,1) 0%, rgba(60,172,249,1) 100%);}
  .ih_0{background: rgb(37,74,6);background: linear-gradient(0deg, rgba(37,74,6,1) 2%, rgba(8,199,163,1) 100%);}
  .ih-title {color:#000; font-weight: bold}
  .raton{cursor: pointer;}
  .title{font-size: 12pt; text-transform: uppercase; letter-spacing:2pt; color: #666; padding: 2px 0 2px 0;}
  .rojo{color:gray; font-size: 18pt; text-decoration: line-through;font-style: normal; letter-spacing: 1pt;}
  .verde{color:red; font-size: 18pt; font-style: normal; font-weight: 500; letter-spacing: 1pt;}
  .espacio{letter-spacing: 0.3cap;}
  .chat{ width: 400px; background-color: #F7FEF9; border-radius: 14px 14px 0 0;}
  .chat_title{background-color: #25D466; padding: 5px; color: #fff; text-align: center;  border-radius: 14px 14px 0 0;}
  .chat_body{padding: 15px; border:#ccc 1px solid; border-radius:14px; background: #fff;  margin: 15px;} 
  .waap{border-radius:5cap; cursor: pointer; background: #25D466; color: #fff; padding: 15px; margin: 0 15px;}
  .waap:hover{opacity: 70%;}
  .fixed-bottom {   
    right: 0;
    left: auto;
    position: fixed;
    bottom: 0;
    padding: 0;
    padding-bottom: 1rem; /* Ajusta el padding según sea necesario */
    border:1px solid #ccc;
    border-radius: 14px;
   
    box-shadow: #666 1px 1px 3px;
    }
</style>
