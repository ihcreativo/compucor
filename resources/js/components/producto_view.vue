
<template>
    <div :class="status">

        <div v-if="producto[0] != undefined" class="container my-5">
            <span class="text-uppercase espacio d-block mb-5">
                <a :href="path"> Inicio </a> / <a href="">{{ producto[0].categoria }}</a> /  {{ producto[0].producto }}
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
                    <div class="btn btn-primary mt-5" @click="solicitar()">
                        SOLICITAR PRODUCTO
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
            opc: 'especificaciones'
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
</style>
