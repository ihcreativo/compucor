
<template>
    <div :class="status">
        <div class="card p-4">
            <div class="card-title">
                <h5><i class="fa-solid fa-sitemap"></i> Configuración del SITIO</h5>
                <hr>
                <div>
                    <div class="row my-3">
                        <div class="col-12">
                            <label for="">Nombre largo del sitio [Nombre de empresa]</label><br>
                            <input type="text" class="form-control">
                            <div class="row">
                                <div class="col-6 mt-3">
                                    <label class="">Nombre corto [Comercial]</label>
                                    <input placeholder="" type="text" class="form-control">
                                </div>
                                <div class="col-6 mt-3">
                                    <label class="">Dominio [ejemplo.com]</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">www.</span>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6 mt-3">
                                    <label for="">Logotipo [png, svg]</label>
                                    <input type="file" class="form-control">
                                </div>
                            
                        
                                <div class="col-6 mt-3">
                                    <label for="">favico [ico, svg]</label><br>
                                    <input type="file" class="form-control">
                                </div>
                               
                                <div class="col-12">
                                    <div class="btn btn-primary mt-3">
                                        <i class="fa-regular fa-floppy-disk"></i> GUARDAR
                                    </div>
                                </div>
                            </div>
                        </div>                    
                    </div>
                </div>
            </div>
        </div>

        <div class="card p-4 my-4">
            <div class="card-title">
                <h5><i class="fa-solid fa-id-card-clip"></i> Configuracion de CONTACTOS</h5>
                <hr>
                <div>
                    <div class="row my-3">
                        <div class="col-12">
                            <label for="">Direccion física de empresa</label><br>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fa-solid fa-location-pin"></i>
                                </div>
                                <input type="text" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-6 mt-3">
                                    <label class="">Ciudad (Municipio)</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-6 mt-3">
                                    <label for="">Departamento</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-6 mt-3">
                                    <label for="">Email</label>
                                    <div class="input-group">
                                        <div class="input-group-text">
                                            <i class="fa-regular fa-envelope"></i>
                                        </div>
                                        <input type="email" class="form-control">
                                     </div> 
                                </div>
                            
                        
                                <div class="col-6 mt-3">
                                    <label for="">Celular</label><br>
                                    <div class="input-group">
                                        <div class="input-group-text">
                                            <i class="fa-solid fa-mobile-screen"></i>
                                        </div>
                                        <input type="email" class="form-control">
                                     </div> 
                                </div>
                                <div class="col-6 mt-3">
                                    <label for="">Telefono</label><br>
                                    <div class="input-group">
                                        <div class="input-group-text">
                                            <i class="fa-solid fa-phone"></i>
                                        </div>
                                        <input type="email" class="form-control">
                                     </div>
                                </div>
                                <div class="col-6 mt-3">
                                    <label for="">Whatsapp</label><br>
                                    <div class="input-group">
                                        <div class="input-group-text">
                                            <i class="fa-brands fa-whatsapp"></i>
                                        </div>
                                        <input type="email" class="form-control">
                                     </div>
                                </div>
                                <div class="col-12">
                                    <div class="btn btn-primary mt-3">
                                        <i class="fa-regular fa-floppy-disk"></i> GUARDAR
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                    </div>

                </div>
                


            </div>
            
        </div>

        <div class="card p-4">
            <div class="card-title">
                <h5><i class="fa-solid fa-people-arrows"></i> Configuración de REDES</h5>
                <hr>
                <div>
                    <div class="row my-3">
                        <div class="col-8">
                            <label for="">Redes Activas</label><br>  
                        </div>
                        
                        <div class="col-4 border-start">
                            <label for="">Seleccion red social</label>
                            <div class="input-group mb-3    ">
                                <div class="input-group-text">
                                    <i class="fa-solid fa-people-arrows"></i>
                                </div>
                                <select name="" id="" class="form-control">
                                    <option value="">Instagram</option>
                                    <option value="">Facebook</option>
                                    <option value="">Youtube</option>
                                    <option value="">X</option>
                                </select>
                            </div>
                            <label for="">Vinculo [ Ruta de la red ]</label>
                            <div class="input-group mb-3">
                                <div class="input-group-text">
                                    URL
                                </div>
                                <input type="email" class="form-control">
                            </div>
                            <div class="btn btn-primary">
                                <i class="fa-regular fa-floppy-disk"></i> GUARDAR
                            </div>
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
