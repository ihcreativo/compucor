
<template>
    <div :class="status">
        <li><a :href="path">Inicio</a></li>
        <li><a :href="path+'/sobre-computadores-de-cordoba'">Sobre compucor</a></li>
        <li id="mnu"></li>
        <li v-for="(mn, i) in categorias" :key="i">
            <a href="#features">
                {{ mn.categoria }}
            </a>
        </li> 
        <li> <a :href="path+'/contactos'">Contactos</a></li>
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
            categorias:[],

        }
    },
    methods:{     
        load_categorias: function(){
            this.status = this.state.LOADING;
            axios.post(this.path+'/getCat').then(res => {
                this.categorias = res.data;
                this.status = this.state.LOADED;
                // this.contenidosAll = this.ordenarContenido(res.data);
                console.log('---ih')
                // console.log(this.contenidosAll);
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
    mounted(){
      this.load_categorias();
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
  .title{font-size: 12pt; letter-spacing:0.2cap; font-weight: bold;}
</style>
