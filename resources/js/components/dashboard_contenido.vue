
<template>
    <div :class="status">
        <div class="d-flex justify-content-between align-items-center mb-2">
        <!-- <div class="d-flex justify-content-between align-items-center mb-2"> -->
            <div class="w-100 ps-1" v-for="(t,i) in contenido_tipo" :key="i">
                <div :class="showMenu == t.id? 'form-control text-center text-dark bg-dark text-white m-0 pb-1 pt-2':'form-control text-center text-dark bg-light-dark m-0 pb-1 pt-2 raton'" @click="selectOpcion(t.id)">
                    <i :class="showMenu == t.id? 'fa-solid fa-folder-open fs-6':'fa-solid fa-folder-closed fs-5'"></i>
                    <fieldset class="title">
                        {{ t.tipo }}
                    </fieldset>
                </div>
            </div>
        </div>    
        <div class="d-md-flex justify-content-md-end mb-2">
            <i :class="opc == 'table'?'fa-solid fa-circle-plus fs-2 text-success raton mt-1 py-0':'d-none'" @click="opc = 'new'"></i>
            <i :class="opc == 'new'?'fa-solid fa-rotate-left fs-3 text-danger raton mt-1 py-0':'d-none'" @click="opc = 'table'"></i>
            <i :class="opc == 'update'?'fa-solid fa-rotate-left fs-3 text-danger raton mt-1 py-0':'d-none'" @click="opc = 'table'"></i>
        </div>
        <div :class="opc === 'new'? 'card p-3 m-0':'d-none'">
            <div class="form">
                <label  for="">TITULO DEL CONTENIDO</label>
                <input class="form-control" placeholder="Digite el titulo del contenido"  type="text" v-model="titulo">
                <label for="" class="pt-3">CONTENIDO </label>
                <TextArea ref="edita"></TextArea>
                <div class="btn btn-primary w-100 my-3" @click="contenido_add()">
                    Crear contenido 
                </div>
            </div>
        </div>
        <div :class="opc === 'update'? 'card p-3 m-0':'d-none'">
            <div class="form">
                <label  for="">TITULO DEL CONTENIDO</label>
                <input class="form-control" placeholder="Digite el titulo del contenido"  type="text" v-model="titulo">
                <label class="pt-3" for="">CONTENIDO</label>
                <TextArea ref="edita_u"></TextArea>
                <div class="btn btn-primary w-50 my-3 py-2" @click="contenido_update()">
                    MODIFICAR CONTENIDO  
                </div>
            </div>
        </div>
        <div :class="opc === 'table'?'table-responsive mb-3':'d-none'">
            <div :class="carga_file?'mb-3':'d-none'">
                <label for="">
                    Subir imagen al contenido [{{ titulo }}]
                </label>
                <div class="input-group">
                    <input class="form-control" id="imagen" type="file" @change="select_file">
                    <div class="btn btn-primary" @click="subirImagen">
                        <i class="fa-solid fa-upload fs-3"></i>
                    </div>
                    <div class="btn btn-danger" @click="carga_file=false">
                        <i class="fa-solid fa-ban fs-3"></i>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr class="fs-6 bg-dark text-start">
                        <th></th>
                        <th colspan="3">
                            CONTENIDOS
                            <span class="d-none">
                                {{ x = 1 }}
                            </span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(c,t) in contenidosAll" :key="t" class="bg-white">
                        <td :class="c.hijo === 'si'? 'd-none':''" width="2%"  >
                            <span v-if="c.hijo === 'no'">
                                {{ x }}
                                <span class="d-none ">{{ x++ }}</span>
                            </span>
                            <span v-else>
                                
                            </span>
                        </td>
                        <td :colspan="c.hijo === 'si'?'2':'1'" :width="c.hijo === 'si'?'52%':'50%'">
                            <img v-if="c.hijo === 'si'" :src="path+'/img/arrow_bottom.png'" width="20px">
                            {{ c.titulo }}
                            
                        </td>
                        <td width="10%" v-if="c.img != 'none'"><img :src="path+'/thum/'+c.img" height="60"></td>
                        <td width="10%" v-else class="p-1 text-center"><img :src="path+'/thum/none.png'" height="70" class="p-0 m-0 raton" title="AGREGAR IMAGEN" @click="loadThumb(c)"></td>
                        <td v-if="c.hijo === 'si'" width="30%" class="fs-4 text-end">
                            <i :class="c.img != 'none'?'fa-solid fa-delete-left me-3 text-warning raton':'d-none'" title="Eliminar IMAGEN" @click="eliminarThum(c)"></i>
                            <i class="fa-regular fa-pen-to-square mx-3 raton" title="MODIFICAR CONTENIDO" @click="selectContenido(c)"></i>
                            <i class="fa-solid fa-circle-xmark text-danger mx-3 raton" title="ELIMINAR CONTENIDO" @click="deleteContenido(c.id,c.titulo)"></i>
                        </td>
                        <td v-else  width="30%" class="fs-4 text-end">
                            <i v-if="((c.id_tipo == 4)&&(c.hijo == 'no'))" class="fa-solid fa-circle-plus text-success raton me-4 py-1" @click="loadOpctioServices(c)" title="Crear opción de servicio"></i>
                            <i :class="c.img != 'none'?'fa-solid fa-delete-left me-3 text-warning raton':'d-none'" title="Eliminar IMAGEN" @click="eliminarThum(c)"></i>
                            <i :class="c.publicar == '1'?'fa-solid fa-circle-check text-success mx-3 raton':'fa-solid fa-ban text-danger mx-3 raton'" :title="c.publicar == '1'?'NO PUBLICAR':'PUBLICAR'" @click="setPublicar(c.id, c.publicar)"></i>
                            <i :class="c.frompage == '1'?'fa-solid fa-display text-primary mx-3 raton':'fa-solid fa-window-maximize text-dark mx-3 raton'" :title="c.publicar == '1'?'QUITAR DE FRONTPAGE':'ENVIAR A FRONTPAGE'" @click="setFrompage(c.id, c.frompage)"></i>
                            <i class="fa-regular fa-pen-to-square mx-3 raton" title="MODIFICAR CONTENIDO" @click="selectContenido(c)"></i>
                            <i class="fa-solid fa-circle-xmark text-danger mx-3 raton" title="ELIMINAR CONTENIDO" @click="deleteContenido(c.id,c.titulo)"></i>
                        
                        </td>
                    </tr>

                </tbody>    
            </table>
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
                            <label  for="">TITULO DEL CONTENIDO</label>
                            <input class="form-control" placeholder="Digite el titulo del contenido"  type="text" v-model="titulo">
                            <label for="" class="pt-3">CONTENIDO </label>
                            <TextArea ref="edita_s"></TextArea>
                            <div class="btn btn-primary w-100 my-3" @click="contenido_add_s()">
                                Crear contenido 
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
            contenido_tipo:[],
            titulo:'',
            contenido:'',
            contenidosAll:[],
            opc: 'table',
            contenidoSeleccionado:[],
            imagen:null,
            carga_file: false,
            Service:[],
            ServisActive : false,
        }
    },
    methods:{
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
                    fields.append('id',this.contenidoSeleccionado.id);
                    fields.append('img',this.imagen);  
                    axios.post(this.path+'/subir_imagen_vue/',fields).then(res => {
                        this.status = this.state.LOADED;
                        document.getElementById('imagen').value = '';
                        this.carga_file = false;
                        this.load_contenido(); 
                    }).catch(err => {
                        this.status = this.state.FAILED;
                       console.log(err)
                    })
                }
                
            }else{
                
                Swal.fire('Debe subir un archivo')
            }
        },
        contenido_add_s: function(){ 
            this.status = this.state.LOADING;
            this.contenido = this.$refs.edita_s.getText();
            console.log(this.titulo+" VS "+this.contenido)
            if((this.titulo.length > 2)&&(this.contenido.length > 6)){
            Swal.fire({
                title: "Realmente desea agregar el contenido  "+this.titulo+"?",
                text: "",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, deseo agregarlo!"
            }).then((result) => {
                if (result.isConfirmed) {
                    let fields =  new FormData();
                    fields.append('titulo',this.titulo);
                    fields.append('contenido',this.contenido);
                    fields.append('id_tipo',this.showMenu);
                    if(this.ServisActive){
                        fields.append('hijo','si');
                        fields.append('id_padre',this.Service.id);
                    }
                    
                    axios.post(this.path+'/contenido_add_Vue',fields).then(res => {
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
                            this.load_contenido();
                            this.Service = [];
                            this.ServisActive = false;
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
                Swal.fire("El TITULO y el CONTENIDO son de caracter [...OBLIGATORIO...]");
                this.status = this.state.LOADED;
            }
        },
        contenido_add: function(){ 
            this.status = this.state.LOADING;
            this.contenido = this.$refs.edita.getText();
            console.log(this.titulo+" VS "+this.contenido)
            if((this.titulo.length > 2)&&(this.contenido.length > 6)){
            Swal.fire({
                title: "Realmente desea agregar el contenido  "+this.titulo+"?",
                text: "",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, deseo agregarlo!"
            }).then((result) => {
                if (result.isConfirmed) {
                    let fields =  new FormData();
                    fields.append('titulo',this.titulo);
                    fields.append('contenido',this.contenido);
                    fields.append('id_tipo',this.showMenu);
                    if(this.ServisActive){
                        fields.append('hijo','si');
                        fields.append('id_padre',this.Service.id);
                    }
                    
                    axios.post(this.path+'/contenido_add_Vue',fields).then(res => {
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
                            this.load_contenido();
                            this.Service = [];
                            this.ServisActive = false;
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
                Swal.fire("El TITULO y el CONTENIDO son de caracter [...OBLIGATORIO...]");
                this.status = this.state.LOADED;
            }
        },
        contenido_update: function(){
            this.status = this.state.LOADING;
            this.contenido = this.$refs.edita_u.texto;
            console.log(this.titulo+"<br>"+this.contenido)
            if((this.titulo.length > 2)&&(this.contenido.length > 6)){
            Swal.fire({
                title: "Realmente desea modifica el contenido  "+this.titulo+"?",
                text: "",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, deseo Modificarlo!"
            }).then((result) => {
                if (result.isConfirmed) {
                    let fields =  new FormData();
                    fields.append('titulo',this.titulo);
                    fields.append('contenido',this.contenido);
                    fields.append('id_tipo',this.showMenu);
                    fields.append('id',this.contenidoSeleccionado.id);
                    axios.post(this.path+'/contenido_update_Vue',fields).then(res => {
                        if(res.data.state == 'ok'){
                            Swal.fire({
                                position: "bottom-end",
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1000,
                                title: "Modificado!",
                                text: "Tu contenido "+this.titulo+" ha sido modificado con Exito!",
                            });
                            this.load_contenido();
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
                Swal.fire("El TITULO y el CONTENIDO son de caracter [...OBLIGATORIO...]");
                this.status = this.state.LOADED;
            }
        },
        delete_caja: function(cj, id){
            Swal.fire({
                title: "Desea eliminar el BANCO o CAJA "+cj+"?",
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
                    fields.append('id',id);
                    axios.post(this.path+'/eliminar_caja-vue',fields).then(res => {
                        if(res.data.state == 'ok'){
                            console.log('Eliminacion exitosa');
                            this.cargar_cajas();
                        }
                        this.status = this.state.LOADED;
                    }).catch(err => {
                        console.log(err);
                        this.status = this.state.FAILED;
                    });


                    Swal.fire({
                        title: "Eliminado!",
                        text: "Tu opción "+cj+" ha sido eliminada.",
                        icon: "success"
                    });
                }
            })

        },
        agregar_opcion: function(){
            this.status = this.state.LOADING;
            if(this.OpcionNew.length > 3){
                let fields =  new FormData();
                fields.append('opcion',this.OpcionNew);
                fields.append('tipo',this.opcionActive);
                //console.log(this.OpcionNew+' - '+tipo);
                axios.post(this.path+'/agregar_opcion-vue',fields).then(res => {
                    if(res.data.state == 'ok'){
                        console.log('registro exitoso');
                        this.cargar_opcion();
                        this.OpcionNew = '';
                    }
                    this.status = this.state.LOADED;
                }).catch(err => {
                    console.log(err);
                    this.status = this.state.FAILED;
                });
            }else{
                Swal.fire('Debe digitar un nombre para la OPCION')
                this.status = this.state.LOADED;
            }
        },
        load_contenido: function(){
            let fields =  new FormData();
            fields.append('id_tipo',this.showMenu);
            this.status = this.state.LOADING;
            axios.post(this.path+'/contenido_Vue',fields).then(res => {
                //this.contenidosAll = res.data;
                this.status = this.state.LOADED;
                this.contenidosAll = this.ordenarContenido(res.data);
                console.log('---ih')
                console.log(this.contenidosAll);
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
        deleteContenido: function(id, title){
            Swal.fire({
                title: "Realmente desea agregar el contenido  "+title+"?",
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
                    
                    axios.post(this.path+'/deleteContenido_Vue',fields).then(res => {
                        if(res.data.state == 'ok'){
                            console.log('Eliminacion exitosa');
                            Swal.fire({
                                position: "bottom-end",
                                icon: "success",
                                timer: 1000,
                                showConfirmButton:false,
                                title: "Eliminado!",
                                text: "Tu contenido "+title+" ha sido quitado con Exito!",
                                icon: "success"
                            });

                            this.load_contenido();
                        }
                        this.status = this.state.LOADED;
                    }).catch(err => {
                        console.log(err);
                        this.status = this.state.FAILED;
                    });

                }
            })

        },
        selectContenido: function(arg){
            this.opc = 'update';
            this.contenidoSeleccionado = arg;
            this.titulo = arg.titulo;
            console.log('contenido :'+arg.contenido)
            this.$refs.edita_u.texto = arg.contenido;
        },
        setFrompage: function(id, opc){
            let x = opc;
            opc === '1'?x = '0':x='1';
            let fields =  new FormData();
            fields.append('id',id);
            fields.append('frompage',x);
            this.status = this.state.LOADING;
            console.log(id+'---'+x);
            axios.post(this.path+'/setFrompage_Vue',fields).then(res => {
                this.status = this.state.LOADED;
                this.load_contenido();
            }).catch(err => {
                console.log(err);
                this.status = this.state.FAILED;
            });
        },
        setPublicar: function(id, opc){
            let x = opc;
            opc === '1'?x = '0':x='1';
            let fields =  new FormData();
            fields.append('id',id);
            fields.append('publicar',x);
            this.status = this.state.LOADING;
            console.log(id+'---'+x);
            axios.post(this.path+'/setPublicar_Vue',fields).then(res => {
                this.status = this.state.LOADED;
                this.load_contenido();
            }).catch(err => {
                console.log(err);
                this.status = this.state.FAILED;
            });

        },
        load_contenido_tipo: function(){
            this.status = this.state.LOADING;
            axios.post(this.path+'/contenido_tipoVue').then(res => {
                this.contenido_tipo = res.data;
                this.status = this.state.LOADED;
                console.log(this.contenido_tipo);
            }).catch(err => {
                console.log(err);
                this.status = this.state.FAILED;
            });
        },

        
        // registro_movimiento : function(){
        //     if(this.status != this.state.LOADING){
        //         this.status = this.state.LOADING;
        //         let x = {
        //             'movimiento':this.movimiento,
        //             'detalle':this.detalle,
        //             'tipo': this.movimientoOpcion,
        //             'id_caja':this.id_caja,
        //             'id_opcion': this.id_opcion
        //         }
        //         if((this.movimiento > 0)&&(this.detalle.length > 2)&&(this.id_caja != 0)&&(this.id_opcion != 0)){
        //             let fields =  new FormData();
        //             fields.append('movimiento',this.movimiento);
        //             fields.append('detalle',this.detalle);
        //             fields.append('tipo',this.movimientoOpcion);
        //             fields.append('id_caja',this.id_caja);
        //             fields.append('id_opcion',this.id_opcion);
        //             // console.log(this.movimiento + ' '+this.detalle+ ' '+this.tipo+' '+this.id_caja+' '+this.id_opcion)
        //             axios.post(this.path+'/registrarMovimiento-vue',fields).then(res => {
        //                 this.response = res.data;
        //                 this.status = this.state.LOADED;
        //                 if(this.response.state == 'ok'){
        //                     this.limpiar();
        //                     this.showMenu = 2;
        //                     this.cargar_movimientos();
        //                 }
        //             }).catch(err => {
        //                 this.status = this.state.FAILED;
        //                 console.log(err)
        //             })
        //         }else{
        //             alert('Los campos (son obligatorios)')
        //         }
        //     }
        // },

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
        this.load_contenido();
        this.load_contenido_tipo();
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
</style>
