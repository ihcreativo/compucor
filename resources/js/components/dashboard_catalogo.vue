
<template>
    <div :class="status">
        <div class="">
            <div class="d-flex bd-highlight">
                <div class=" flex-grow-1 bd-highlight fs-6 fw-light letter">
                    <span :class="opc != 'table'?'text-danger fw-bold raton':''" @click="opc='table'">CATALOGO</span>  <span class="fs-6 text-uppercase fw-bold" v-if="opc === 'productosCat'"><i class="fa-solid fa-arrow-right"></i> {{ productosCat.categoria }} </span>
                </div>
                <div class="bd-highlight fs-3 text-primary">
                    <i :class="opc == 'table'?'fa-solid fa-circle-plus fs-2 text-success raton mt-1 py-0':'d-none'" @click="opc = 'new'"></i>
                    <i :class="opc == 'new'?'fa-solid fa-rotate-left fs-3 text-danger raton mt-1 py-0':'d-none'" @click="opc = 'table'"></i>
                    <i :class="opc == 'update'?'fa-solid fa-rotate-left fs-3 text-danger raton mt-1 py-0':'d-none'" @click="opc = 'table'"></i>
                    <!-- <span :class="opc == 'productosCat'?'btn btn-success fs-6':'d-none'" @click="opcProducto = 'create'">Nuevo producto</span>
                    <span :class="opcProducto == 'create'?'btn btn-danger fs-6':'d-none'" @click="opcProducto = 'view'">Cancelar</span> -->
                    <span :class="opc == 'productosCat'?'':'d-none'">
                        <span v-if="opcProducto === 'create'" class="btn btn-danger" @click="opcProducto='view'">Cancelar</span>
                        <span v-else class="btn btn-success" @click="opcProducto='create'">Nuevo producto </span>
                    </span>
                </div>
            </div>

            <div :class="opc === 'table'? 'row':'d-none'">
                <th class="checkbox-area" scope="col"></th>
                <div class="col-4 mb-3" v-for="(c,i) in categorias" :key="i">
                        <div class="card p-2 mb-3">
                            <div class="row">
                                <div class="col-5">
                                    <img class="raton" :src="path+'/tienda/categorias/'+c.banner" width="100px" alt="" @click="modalFunction('#load_imagen','show',c)">
                                </div>
                                <div class="col-7">
                                    <h5>{{ c.categoria }} </h5>
                                    Productos <br>
                                    <a :href="'catalogo/'+c.id+'/'+c.slug">
                                        <h2>{{ c.n_producto }}</h2>
                                    </a> 
                                    <div>
                                        <span @click="viewCategoria(c)">
                                            ADMINISTRAR
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

               </div>
            </div>
            <div :class="opc === 'new'? 'row':'d-none'">
                <div class="col-10">
                    <div class="form card p-3">
                        <label  for="">C A T </label>
                        <div class="input-group mb-0">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fa-solid fa-icons"></i>
                            </span>
                            <!-- <input type="text" class="form-control" placeholder="Notification" aria-label="notification" aria-describedby="basic-addon1"> -->
                            <input class="form-control" placeholder="Digite el titulo del contenido" @keyup="load_slug()" type="text" v-model="CAT">
                        </div>
                        <label for="" class="pt-3">D E S C </label>
                        <div class="input-group mb-0">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fa-solid fa-list"></i>
                            </span>
                            <input class="form-control" placeholder="Descripcion"  type="text" v-model="DESC">
                        </div>
                        <label for="" class="pt-3">S L U G </label>
                        <div class="input-group mb-0">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fa-solid fa-link"></i>
                            </span>
                            <input class="form-control" placeholder=""  type="text" v-model="SLUG">
                        </div>
                        <label for="" class="pt-3 fs-6">I M A G E N</label>
                        <!-- <div class="input-group mb-0">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fa-solid fa-file-image"></i>
                            </span>
                            <input class="form-control" id="imagen" type="file" @change="select_file">
                        </div> -->
                        <div class="btn btn-primary w-25 my-3 py-3" @click="categoria_add">
                            <i class="fa-solid fa-floppy-disk"></i>
                            GUARDAR CATEGORIA 
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="card">
                        <div class="card-body h-100 text-center">
                            Descargar Ejemplo  <br>  
                            400px - 760px    
                            <img :src="path+'/assets/img/example.png'" width="100%" alt="">
                        </div>
                            
                    </div>
                </div>
            </div>
            <!-- Modulo de producto -->
            <div :class="opc === 'productosCat'? 'row':'d-none'">
                <div :class="opcProducto === 'view'?'':'d-none'">
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        
                        <thead>
                            <tr class="bg-dark">
                                <th></th>
                                <th colspan="2">PRODUCTOS</th>
                                <th colspan="2">OPCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(p,i) in productosAll" :key="i">
                                <td class="numeracion" >{{ i+1 }}</td>
                                <td class="minimo p-1"> 
                                    <img :src="path+'/tienda/productos/thum/'+p.img" width="100%" alt=""></td>
                                <td>
                                    <span class="text-uppercase">
                                        {{ p.producto }}
                                    </span><br>
                                    <span :class="p.oferta > 0?'text-danger  linethrough':'text-success'">
                                        Precio: 
                                        <i class="fa-solid fa-dollar-sign"></i>
                                        {{ miles(p.precio) }} 
                                    </span>
                                    <span :class="p.oferta > 0?'text-success ms-3':'d-none'">
                                        Oferta :<i class="fa-solid fa-dollar-sign"></i>
                                        {{ miles(p.oferta) }}
                                    </span>
                                </td>
                                <td class="fs-5">
                                    {{ p.n_img }} <i class="fa-solid fa-image"></i> <i class="fa-solid fa-circle-plus text-success raton" @click="modal_imagenes_producto('#producto_imagen','show',p)"></i>
                               
                                </td>
                               
                                <td  width="30%" class="fs-4 text-end">
                                    <!-- <i v-if="((c.id_tipo == 4)&&(c.hijo == 'no'))" class="fa-solid fa-circle-plus text-success raton me-4 py-1" @click="loadOpctioServices(c)" title="Crear opción de servicio"></i> -->
                                    <!-- <i :class="c.img != 'none'?'fa-solid fa-delete-left me-3 text-warning raton':'d-none'" title="Eliminar IMAGEN" @click="eliminarThum(c)"></i> -->
                                    <i :class="p.publicar == '1'?'fa-solid fa-circle-check text-success mx-3 raton':'fa-solid fa-ban text-danger mx-3 raton'" :title="p.publicar == '1'?'NO PUBLICAR':'PUBLICAR'" @click="setPublicar(p.id, p.publicar,'publicar')"></i>
                                    <i :class="p.frompage == '1'?'fa-solid fa-display text-primary mx-3 raton':'fa-solid fa-window-maximize text-dark mx-3 raton'" :title="p.publicar == '1'?'QUITAR DE FRONTPAGE':'ENVIAR A FRONTPAGE'" @click="setPublicar(p.id, p.frompage,'frompage')"></i>
                                    <i class="fa-regular fa-pen-to-square mx-3 raton" title="MODIFICAR CONTENIDO" @click="selectContenido(p)"></i>
                                    <i v-if="p.n_img === 0" class="fa-solid fa-circle-xmark text-danger mx-3 raton" title="ELIMINAR CONTENIDO" @click="producto_del(p.id,p.producto)"></i>
                                    <i v-else class="fa-solid fa-circle-xmark text-muted mx-3 "></i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
                
                
                <div :class="opcProducto === 'create'?'':'d-none'">
                    <div v-if="productosCat.categoria != undefined">
                        <div class="form card p-3">
                            <label class="letter"  for="">PRODUCTO </label>
                            <div class="input-group mb-0">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fa-solid fa-icons"></i>
                                </span>
                                <!-- <input type="text" class="form-control" placeholder="Notification" aria-label="notification" aria-describedby="basic-addon1"> -->
                                <input class="form-control" placeholder="Digite el titulo del producto" @keyup="load_slug_p()" type="text" v-model="p_pro">
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <label for="" class="pt-3 letter">ESPECIFICACIONES </label>
                                    <div class="input mb-0">
                                        <!-- <input class="form-control" placeholder="Descripcion"  type="text" v-model="DESC"> -->
                                        <TextArea ref="especificaciones"></TextArea>
                                    </div>

                                    <label for="" class="pt-3 letter">DETALLES </label>
                                    <div class="input mb-0">
                                        <!-- <input class="form-control" placeholder="Descripcion"  type="text" v-model="DESC"> -->
                                        <TextArea ref="caracteristicas"></TextArea>
                                    </div>

                                    <label for="" class="pt-3 letter">TERMINOS </label>
                                    <div class="input mb-0">
                                        <!-- <input class="form-control" placeholder="Descripcion"  type="text" v-model="DESC"> -->
                                        <TextArea ref="terminos"></TextArea>
                                    </div>
    
                                </div>
                                <div class="col-4">
                                    <label for="" class="pt-3 letter">MARCA  {{ p_marca }}</label>
                                    <div class="input-group mb-0">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="fa-solid fa-money-check-dollar"></i>
                                        </span>
                                        <select class="form-control" v-model="p_marca">
                                            <option :value="mc.marca" v-for="(mc, i) in marcas" :key="i">{{mc.marca}}</option>
                                        </select>
                                    </div>
                                    <label for="" class="pt-3 letter">PRECIO </label>
                                    <div class="input-group mb-0">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="fa-solid fa-money-check-dollar"></i>
                                        </span>
                                        <input class="form-control" placeholder="Precio de venta"  type="text" v-model="p_pre">
                                    </div>
                                    <label for="" class="pt-3 letter">OFERTA </label>
                                    <div class="input-group mb-0">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="fa-solid fa-comments-dollar"></i>
                                        </span>
                                        <input class="form-control" placeholder="Precio de oferta"  type="text" v-model="p_ofe">
                                    </div>
                                    <div class="card my-4">
                                        <div class="card-body py-0">
                                            <label for="" class="pt-3 letter">PUBLICAR </label><br>
                                            <div class="form-check form-check-primary form-check-inline">
                                                <input class="form-check-input" checked type="radio" name="radio-checked" id="form-check-radio-default">
                                                <label class="form-check-label" for="form-check-radio-default">
                                                    NO
                                                </label>
                                            </div>
                                            <div class="form-check form-check-primary form-check-inline">
                                                <input class="form-check-input" type="radio" name="radio-checked" id="form-check-radio-default">
                                                <label class="form-check-label" for="form-check-radio-default">
                                                    SI
                                                </label>
                                            </div>
                                        </div>
                                    </div>
    
                                </div>
    
                            </div>
                            
                            <div class="btn btn-primary w-25 my-3 py-3" @click="producto_add">
                                <i class="fa-solid fa-floppy-disk"></i>
                                CREAR PRODUCTO 
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>    


        
        <!-- modal producto_imagen-->
        <div class="modal fade modal-lg" id="producto_imagen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content fondo p-0">
                    <div class="text-danger text-end m-1  pe-3 pt-3" data-bs-dismiss="modal" aria-label="Close">
                        <span class="badge badge-danger m-0">
                            <i class="fa-solid fa-x"></i>
                        </span>
                    </div>
                    <div class="modal-body p-0 px-3 pb-3 ">
                        <h4 class="text-uppercase">{{ this.dataModal.producto }}</h4>
                        <!-- {{ this.dataModal }} -->
                         <div class="form" v-if="this.dataModal != undefined">
                            <div class="input-group mb-0">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fa-solid fa-icons"></i>
                                </span>
                                <input class="form-control" id="imagenP" type="file" @change="select_file">
                                <div class="input-group-text btn btn-primary fs-6" @click="subirImagenProducto">
                                    CARGAR
                                </div>  
                            </div>
                             <div class="row">
                                <div class="col-9">
                                    <label for="" class="pt-3">Imagenes del producto </label>
                                    <div class="row">
                                        <div class="col-3" v-for="(img, i) in imagenes_producto" :key="i">
                                            <div class="card px-2 py-2  m-2">
                                                <img class="w-100" :src="path+'/tienda/productos/thum/'+img.img" alt="">
                                                <div :class="img.img != dataModal.img? 'fs-4':'d-none'">
                                                    <span  class="raton text-danger me-3" @click="quitar_imagen_producto(img)">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </span>
                                                    <span class=" raton text-primary" @click="principal_imagen_asignar(img)">
                                                        <i class="fa-solid fa-file-image"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 card p-2 mt-4 text-center">
                                    IMAGEN PRINCIPAL
                                    <img class="w-100" :src="path+'/tienda/productos/thum/'+this.dataModal.img" alt="">
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>     
            </div>
        </div>
        <!-- Fin modal imagen producto -->
        <!-- modal movimiento-->
        <div class="modal fade" id="load_imagen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content fondo p-0">
                    <div class="text-danger text-end m-1  pe-3 pt-3" data-bs-dismiss="modal" aria-label="Close">
                        <span class="badge badge-danger m-0">
                            <i class="fa-solid fa-x"></i>
                        </span>
                    </div>
                    <div class="modal-body p-0 px-3 pb-3 ">
                        <div class="form" v-if="this.dataModal.categoria != undefined">
                           
                            <label  for="">CATEGORIA</label>
                             <div class="row">
                                <div class="col-8">
                                    <h1>{{ this.dataModal.categoria }}</h1>
                                    <label for="" class="pt-3">NUEVA IMAGEN </label>
                                    <input class="form-control" id="imagen" type="file" @change="select_file">
                                    <div class="btn btn-primary w-100 my-3" @click="subirImagen">
                                        CARGAR IMAGEN 
                                    </div>
                                </div>
                                <div class="col-4">
                                    <img :src="path+'/tienda/categorias/'+this.dataModal.banner" width="100px" alt=""><br>
                                    [ Quitar imagen ]
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
        id : {type:String, default:'0'}
    },

    data() {
        return {
            status: 'ini',
            state: {'INI': 'ini', 'LOADING': 'loading', 'LOADED': 'loaded', 'FAILED': 'failed'},
            showMenu: 1,
            categorias:[],
            opc: 'table',
            opcProducto: 'view',
            imagen:null,
            imagenes_producto:[],
            carga_file: false,
            Service:[],
            ServisActive : false,
            CAT: '',
            SLUG: '',
            DESC: '',
            BANNER: '',
            dataModal:[],
            productosCat:[],
            productosAll:[],
            marcas:[],
            p_pro:'',
            p_des:'',
            p_pre:'',
            p_ofe:'',
            p_pub:'',
            p_slu:'',
            p_idCat:'',
            p_marca:''
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
        setPublicar: function(id, opc, campo){
            let x = opc;
            opc === '1'?x = '0':x='1';
            let fields =  new FormData();
            fields.append('id',id);
            fields.append('publicar',x);
            fields.append('campo', campo);
            this.status = this.state.LOADING;
            axios.post(this.path+'/publicar_producto',fields).then(res => {
                this.viewCategoria(this.productosCat)
                this.status = this.state.LOADED;
                
            }).catch(err => {
                console.log(err);
                this.status = this.state.FAILED;
            });

        },
        modalFunction: function (opc,arg, data){
            // '#exampleModal'
            this.dataModal = data;
            console.log(data);
            $(opc).modal(arg);
        },

        load_slug: function(){
            const acentos = {'á':'a','é':'e','í':'i','ó':'o','ú':'u','Á':'a','É':'e','Í':'i','Ó':'o','Ú':'u','ñ':'n','Ñ':'n',' ':'-','A':'a','B':'b','C':'c','D':'d','E':'e','F':'F','G':'g','H':'h','I':'i','J':'j','K':'k','L':'l','M':'m','N':'n','O':'o','P':'p','Q':'q','R':'r','S':'s','T':'t','U':'u','V':'v','W':'w','X':'x','Y':'y','Z':'z'};
            this.SLUG = this.CAT.split('').map( letra => acentos[letra] || letra).join('').toString();	
        },
        load_slug_p: function(){
            const acentos = {'á':'a','é':'e','í':'i','ó':'o','ú':'u','Á':'a','É':'e','Í':'i','Ó':'o','Ú':'u','ñ':'n','Ñ':'n',' ':'-','A':'a','B':'b','C':'c','D':'d','E':'e','F':'F','G':'g','H':'h','I':'i','J':'j','K':'k','L':'l','M':'m','N':'n','O':'o','P':'p','Q':'q','R':'r','S':'s','T':'t','U':'u','V':'v','W':'w','X':'x','Y':'y','Z':'z'};
            this.p_slu = this.p_pro.split('').map( letra => acentos[letra] || letra).join('').toString();	
        },
        select_file : function(event){
            this.imagen = event.target.files[0];
        },
        activar_movimiento: function(view, opcion){
            this.showMenu = view;
            this.movimientoOpcion = opcion
        },
        desactivar_movimiento: function(){
            this.showMenu = 1;
        },
        
        selectOpcion: function(arg){
            this.showMenu = arg;
            this.load_contenido();
        },
        setOpcion: function(arg){
            this.opcion = arg
        },

        categoria_add: function(){ 
            this.status = this.state.LOADING;
            if(this.CAT.length > 5){
            Swal.fire({
                title: "Realmente desea agregar la categoria  "+this.CAT+"?",
                text: "",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, deseo agregarlo!"
            }).then((result) => {
                if (result.isConfirmed) {
                    let fields =  new FormData();
                    fields.append('categoria',this.CAT);
                    fields.append('slug',this.SLUG);
                    fields.append('descripcion',this.DESC);
                    fields.append('banner',this.BANNER);
                    
                    axios.post(this.path+'/catalogo_add',fields).then(res => {
                        if(res.data.state == 'ok'){
                            console.log('registro exitoso');
                            Swal.fire({
                                position: "bottom-end",
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1000,
                                title: "Agregado!",
                                text: "Tu contenido "+this.titulo+" ha sido creado con Exito!",
                            });
                            this.load_categoria();
                            this.opc = 'table';
                        }
                        this.status = this.state.LOADED;
                    }).catch(err => {
                        console.log(err);
                        this.status = this.state.FAILED;
                    });
                }
            })

            }else{
                Swal.fire("La CATEGORIA es  [...OBLIGATORIA...]");
                this.status = this.state.LOADED;
            }
        },

        producto_add: function(){ 
            this.status = this.state.LOADING;
            alert(this.p_marca);
            if(this.p_pro.length > 5){
            Swal.fire({
                title: "Realmente desea agregar el producto  "+this.p_pro+"?",
                text: "",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, deseo agregarlo!"
            }).then((result) => {
                if (result.isConfirmed) {
                    let fields =  new FormData();
                    fields.append('producto',this.p_pro);
                    fields.append('slug',this.p_slu);
                    fields.append('especificaciones',this.$refs.especificaciones.getText());
                    fields.append('caracteristicas',this.$refs.caracteristicas.getText());
                    fields.append('terminos',this.$refs.terminos.getText());
                    fields.append('marca',this.p_marca);
                    fields.append('id_categoria',this.productosCat.id);
                    fields.append('precio',this.p_pre);
                    fields.append('oferta',this.p_ofe);
                    
                    axios.post(this.path+'/producto_add',fields).then(res => {
                        if(res.data.state == 'ok'){
                            console.log('registro exitoso');
                            Swal.fire({
                                position: "bottom-end",
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1000,
                                title: "Agregado!",
                                text: "Tu contenido "+this.p_pro+" ha sido creado con Exito!",
                            });
                            //this.load_categoria();
                            this.opc = 'productosCat';
                        }
                        this.status = this.state.LOADED;
                    }).catch(err => {
                        console.log(err);
                        this.status = this.state.FAILED;
                    });
                }
            })

            }else{
                Swal.fire("La CATEGORIA es  [...OBLIGATORIA...]");
                this.status = this.state.LOADED;
            }
        },

        producto_del: function(id, nombre_p){
            this.status = this.state.LOADING;
            let fields =  new FormData();
            fields.append('id',id);
            axios.post(this.path+'/producto_del',fields).then(res => {
                console.log(res.data);
                this.status = this.state.LOADED;
            }).catch(err => {
                console.log(err);
                this.status = this.state.FAILED;
            });
        },

        get_marca: function(){
             this.status = this.state.LOADING;
             axios.post(this.path+'/get_marca').then(res => {
                this.marcas = res.data;
                console.log(res.data);
                this.status = this.state.LOADED;
            }).catch(err => {
                console.log(err);
                this.status = this.state.FAILED;
            });
        },

        viewCategoria: function(arg){
            // this.productosAll = [];
            this.opc = 'productosCat';
            this.productosCat = arg;
            this.status = this.state.LOADING;
            let fields =  new FormData();
           
            fields.append('id',arg.id);
            axios.post(this.path+'/getProductos',fields).then(res => {
                this.productosAll = res.data;
                console.log(res.data);
                this.status = this.state.LOADED;
                console.log(this.categorias);
            }).catch(err => {
                console.log(err);
                this.status = this.state.FAILED;
            });

        },

        loadThumb: function(arg){
            // $('#ModalX').modal('show');
            this.contenidoSeleccionado = arg;
            this.titulo = arg.titulo;
            this.carga_file = true;
        },
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
        subirImagen: function(){
            if(this.imagen != null){
                if(this.status != this.state.LOADING){
                    this.status = this.state.LOADING;
                    let fields =  new FormData();
                    fields.append('id',this.dataModal.id);
                    fields.append('img',this.imagen);  
                    axios.post(this.path+'/subir_imagen_CAT_vue/',fields).then(res => {
                        this.status = this.state.LOADED;
                        document.getElementById('imagen').value = '';
                        this.carga_file = false;
                        this.load_categoria(); 
                    }).catch(err => {
                        this.status = this.state.FAILED;
                       console.log(err)
                    })
                }
                
            }else{
                
                Swal.fire('Debe subir un archivo')
            }
        },
        modal_imagenes_producto: function (opc,arg, data){
            this.load_imagen_productos(data);
            this.dataModal = data;
            console.log(data);
            $(opc).modal(arg);
        },
        load_imagen_productos: function(arg){
            console.log(arg);
            this.status = this.state.LOADING;
            let fields =  new FormData();
            fields.append('id',arg.id);
            axios.post(this.path+'/get_imagenes_producto/',fields).then(res => {
                this.imagenes_producto = res.data;
                this.status = this.state.LOADED;
                console.log('isaias')
                console.log(this.imagenes_producto);
                console.log('antonio')
            }).catch(err => {
                console.log(err);
                this.status = this.state.FAILED;
            });
        },

        principal_imagen_asignar: function(arg){
            this.status = this.state.LOADING;
            let fields =  new FormData();
            fields.append('id',arg.id);
            fields.append('img',arg.img);
            fields.append('id_producto',arg.id_producto);
            axios.post(this.path+'/principal_imagen_asignar/',fields).then(res => {
                // this.load_imagen_productos(this.dataModal);
                this.viewCategoria(this.productosCat);
                this.dataModal.img = arg.img;
                this.status = this.state.LOADED;
            }).catch(err => {
                console.log(err);
                this.status = this.state.FAILED;
            });
        },

        quitar_imagen_producto: function(arg){
            this.status = this.state.LOADING;
            let fields =  new FormData();
            fields.append('id',arg.id);
            fields.append('img',arg.img);
            axios.post(this.path+'/quitar_imagenes_producto/',fields).then(res => {
                this.load_imagen_productos(this.dataModal);
                this.status = this.state.LOADED;
                
            }).catch(err => {
                console.log(err);
                this.status = this.state.FAILED;
            });
        },

        subirImagenProducto: function(){
            if(this.imagen != null){
                if(this.status != this.state.LOADING){
                    this.status = this.state.LOADING;
                    let fields =  new FormData();
                    fields.append('id',this.dataModal.id);
                    fields.append('img',this.imagen);  
                    axios.post(this.path+'/subir_imagen_producto/',fields).then(res => {
                        this.status = this.state.LOADED;
                        document.getElementById('imagenP').value = '';
                        this.load_imagen_productos(this.dataModal);
                        //this.carga_file = false;
                       // this.load_categoria(); 
                    }).catch(err => {
                        this.status = this.state.FAILED;
                       console.log(err)
                    })
                }
                
            }else{
                
                Swal.fire('Debe subir un archivo')
            }
        },

        load_categoria: function(){
            this.status = this.state.LOADING;
            axios.post(this.path+'/getCat').then(res => {
                this.categorias = res.data;
                this.status = this.state.LOADED;
                console.log(this.categorias);
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
        loadOpctioServices: function(arg, title){
            this.Service = arg;
            this.ServisActive = true;
            $('#loadOpctioServices').modal('show');
        },
        // loadOpcion: function(arg){
        //     this.opcionActive = arg;
        //     $('#ModalOpcion').modal('show');
        // },
        getImg: function(arg){
            return this.path_img.replace('@',arg);
        },


    },
    mounted() {
        this.load_categoria();
        this.get_marca();
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
  .title{font-size: 10pt; letter-spacing:0.2cap; font-weight: bold;}
  .letter{letter-spacing: 0.3cap;}
  .minimo{width: 7%;}
  .numeracion{width: 1%;}
  .linethrough{text-decoration: line-through;}
</style>
