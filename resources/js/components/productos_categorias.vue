
<template>
    <div :class="status">
        
        <div class="container my-5">
            <span class="text-uppercase espacio d-block mb-5">
                <a :href="path"> Inicio </a> / {{ cat.categoria }}
            </span>
            <div class="col-xl-3 col-lg-3 col-sm-6 mb-4" v-for="(p,i) in productos" :key="i" @click="location.href=''">
                <div class="mx-3 my-3 px-2 text-center">
                    <!-- <img class="rounded-5" :src="path+'/tienda/productos/thum/'+p.img" width="100%" alt=""><br>-->
                    <div class="position-relative mb-3">
                        <img class="rounded-5" :src="path+'/tienda/productos/thum/'+p.img" width="100%" alt="">
                        <span :class="p.oferta > 0?'position-absolute top-5 start-100 translate-middle badge rounded-pill bg-danger':'d-none'">
                            OFERTA
                        </span>
                    </div>
                    <span class="title">
                        {{ p.producto }}
                    </span>
                    <div class="text-center fs-2">
                        <!-- <span v-html="p.descripcion"> </span> -->
                        <span :class="p.oferta > 0?'rojo':'text-success'"> 
                            <i class="fa-solid fa-dollar-sign"></i>
                            $ {{ miles(p.precio) }} 
                        </span>
                        <span :class="p.oferta > 0?'verde ':'d-none'">
                            <br>
                            <i class="fa-solid fa-dollar-sign"></i>
                            $ {{ miles(p.oferta) }}
                        </span><br>
                        <a :href="path+'/tienda/'+p.id+'/'+p.slug">
                            <span class="btn btn-primary" >
                                Ver mas
                            </span>
                        </a>
                           
                    </div>
                </div>
                
            </div>
        </div>
        <!-- modal movimiento-->
        <div class="modal fade" id="loadOpctioServices" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content fondo p-0">
                    <div class="text-danger text-end m-1  pe-3 pt-3" data-bs-dismiss="modal" aria-label="Close">
                        <span class="badge badge-danger m-0">
                            <i class="fa-solid fa-x"></i>
                        </span>
                    </div>
                    <div class="modal-body p-0 px-3 pb-3 ">
                        <div class="form">
                            
               
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
        cat : {type:String, default:'0'}
    },

    data() {
        return {
            status: 'ini',
            state: {'INI': 'ini', 'LOADING': 'loading', 'LOADED': 'loaded', 'FAILED': 'failed'},
            productos:[],
        }
    },
    methods:{
        isEmpty: function(arg){
            return [undefined, null, ''].includes(arg);
        },
        miles: function(num){
            if(this.isEmpty(num)){
                return 0;
            }
            return num.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
        },
        
        load_productos: function(id){
            this.status = this.state.LOADING;
            let fields =  new FormData();
            fields.append('id',id);
            axios.post(this.path+'/categoria/productos', fields).then(res => {
                this.productos = res.data;
                this.status = this.state.LOADED;
                // this.contenidosAll = this.ordenarContenido(res.data);
                console.log('---ih')
                console.log(this.productos);
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
       this.cat = JSON.parse(this.cat);
       this.load_productos(this.cat.id);
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
