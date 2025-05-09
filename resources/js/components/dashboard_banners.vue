
<template>
    <div :class="status">
        <h5>ADMINISTRADOR DE BANNERS</h5>
        <div :class="opc === 'new'? 'card p-3 m-0':'d-none'">
            <div class="form">
                <label for="" class="pt-3">NOMBRE DE BANNER</label>
                <input class="form-control" placeholder="Digite el titulo del contenido"  type="text" v-model="titulo">
                <label for="" class="pt-3">IMAGEN</label>
                <input class="form-control" id="imagen" type="file" @change="select_file">
                <label for="" class="pt-3">DESCRIPCION </label>
                <textarea class="form-control" name="" v-model="descripcion" id=""></textarea>
                <!-- <TextArea ref="TextArea_"></TextArea> -->

                <div class="btn btn-primary w-50 py-2 my-3" @click="banner_add()">
                    CREAR BANNER
                </div>
            </div>
        </div>
        <div class="card p-2">
            <div class="row">
                <div class="col-8">
                    <table class="table">
                        <tbody >
                            <tr v-for="(b,i) in banners" :key="i">
                                <td class="p-2">
                                    <div class="text-end">
                                        <input type="number" class="fs-6 colmin" :value="b.orden">
                                        <i :class="b.publicar != 'si'?'fa-solid fa-solid fa-ban my-0 mb-2 mx-3 text-warning fs-4 raton':'fa-solid fa-circle-check  my-0 mb-2 mx-3 fs-4 text-success raton'" @click="setPublicar(b.id,b.publicar)" :title="b.publicar == 'si'?'PUBLICAR':'No PUBLICAR'"></i>
                                        <i class="fa-solid fa-circle-xmark fs-4 text-danger  raton" title="ELIMINAR CONTENIDO" @click="deleteBanner(b.id,b.titulo)"></i>
                                    </div>
                                    <img :src="path+'/'+b.url" class="w-100">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-4">
                    <div class="form  border-start p-3 sticky sticky-top h-100">
                        <label for="" class="pt-3">NOMBRE DE BANNER</label>
                        <input class="form-control" placeholder="Digite el titulo del contenido"  type="text" v-model="titulo">
                        <label for="" class="pt-3">IMAGEN</label>
                        <input class="form-control" id="imagen" type="file" @change="select_file">
                        <label for="" class="pt-3">DESCRIPCION </label>
                        <textarea class="form-control" name="" v-model="descripcion" id=""></textarea>
                        <!-- <TextArea ref="TextArea_"></TextArea> -->

                        <div class="btn btn-primary w-100 py-2 my-3" @click="banner_add()">
                            CREAR
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- modal movimiento-->
        <div class="modal fade" id="ModalX" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">

            </div>
        </div>
        <!-- Fin modal Movimiento -->

    </div>
</template>

<script>
import axios from 'axios';
import { Key } from 'react';

export default {
    props:{
        path:{type:String, default:''},
        id : {type:String, default:'0'}
    },

    data() {
        return {
            status: 'ini',
            state: {'INI': 'ini', 'LOADING': 'loading', 'LOADED': 'loaded', 'FAILED': 'failed'},

            titulo:'',
            descripcion:'',
            opc: 'table',
            imagen:null,
            carga_file: false,
            banners:[]
        }
    },
    methods:{

        eliminarThum: function(arg){
            this.contenidoSeleccionado = arg;
            this.titulo = arg.titulo;
            Swal.fire({
                title: "Desea eliminar la imagen del contenido "+this.titulo+"?",
                text: "Una vez eliminado, NO hay vuelta atras.!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, deseo eliminar!"
            }).then((result) => {
                if (result.isConfirmed) {
                    this.status = this.state.LOADING;
                    let fields =  new FormData();
                    fields.append('id',this.contenidoSeleccionado.id);
                    fields.append('img',this.contenidoSeleccionado.img);
                    axios.post(this.path+'/eliminar_imagen_vue/',fields).then(res => {
                        console.log(res.data);
                        console.log(res.data.image)
                        this.load_contenido();
                        this.status = this.state.LOADED;
                    }).catch(err => {
                            this.status = this.state.FAILED;
                        console.log(err)
                    })

                }
            })
        },
        select_file : function(event){
            this.imagen = event.target.files[0];
        },
        banner_add: function(){
            if(this.imagen != null){
                if(this.status != this.state.LOADING){
                    this.status = this.state.LOADING;
                    let fields =  new FormData();
                    fields.append('banner',this.titulo);
                    fields.append('img',this.imagen);
                    fields.append('descripcion',this.descripcion);
                    axios.post(this.path+'/subir_banner_vue/',fields).then(res => {
                        this.getBanners();
                        this.status = this.state.LOADED;
                        document.getElementById('imagen').value = '';
                        //t<his.carga_file = false;
                        //this.load_contenido();
                    }).catch(err => {
                        this.status = this.state.FAILED;
                       console.log(err)
                    })
                }

            }else{

                Swal.fire('Debe subir un archivo')
            }
        },

        getBanners: function(){
            let fields =  new FormData();
            fields.append('id_tipo',this.showMenu);
            this.status = this.state.LOADING;
            axios.post(this.path+'/getBanners_Vue',fields).then(res => {
                this.banners = res.data;
                console.log('isaias')
                console.log(res.data);
                this.opc = 'table';
                this.status = this.state.LOADED;
            }).catch(err => {
                console.log(err);
                this.status = this.state.FAILED;
            });
        },
        deleteBanner: function(id, title){
            Swal.fire({
                title: "Realmente desea agregar el Banner"+title+"?",
                text: "",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, deseo eliminarlo!"
            }).then((result) => {
                if (result.isConfirmed) {
                    let fields =  new FormData();
                    fields.append('id',id);
                    axios.post(this.path+'/deleteBanner_Vue',fields).then(res => {
                        console.log('Eliminacion exitoso');
                        console.log(res.data)
                        if(res.data.state == 'si'){
                            this.getBanners();
                            Swal.fire({
                                title: "Eliminado!",
                                text: "Tu banner "+title+" ha sido quitado con Exito!",
                                icon: "success"
                            });
                        }
                        this.status = this.state.LOADED;
                    }).catch(err => {
                        console.log(err);
                        this.status = this.state.FAILED;
                    });

                }
            })

        },

        setPublicar: function(id, opc){
            let x = opc;
            opc === 'si'?x = 'no':x='si';
            let fields =  new FormData();
            fields.append('id',id);
            fields.append('publicar',x);
            this.status = this.state.LOADING;
            console.log(id+'---'+x);
            axios.post(this.path+'/setBannerPublicar_Vue',fields).then(res => {
                this.status = this.state.LOADED;
                this.getBanners();
            }).catch(err => {
                console.log(err);
                this.status = this.state.FAILED;
            });

        },

        limpiar: function(){
            this.id_caja = 0;
            this.id_opcion = 0;
            this.movimiento = 0;
            this.detalle = '';
        },
        loadCaja: function(){
            $('#ModalCaja').modal('show');
        },
        loadOpcion: function(arg){
            this.opcionActive = arg;
            $('#ModalOpcion').modal('show');
        },
        getImg: function(arg){
            return this.path_img.replace('@',arg);
        },


    },
    mounted() {
        this.getBanners();
    }
}
</script>
<style scoped>
  .colmin {width: 50px; white-space: nowrap; text-align: center}
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
  .title{font-size: 10pt; letter-spacing:0.2cap; font-weight: bold;}
</style>
