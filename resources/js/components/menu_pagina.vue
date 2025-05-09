<template>

  <div class="">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav justify-content-center text-light w-100">
          <li class="nav-item me-2">
            <a class="nav-link text-light" aria-current="page" :href="path+'/home'" @click="opcMenu = 'home'"><i class="bi bi-house"></i> 
              PRODUCTOS
            </a>
          </li>
          <li class="nav-item me-2">
            <a class="nav-link text-light" aria-current="page" :href="path+'/home'" @click="opcMenu = 'home'"><i class="bi bi-house"></i> 
              PRODUCTOS
            </a>
          </li>
          <li class="nav-item me-2 dropdown">
            <a class="nav-link  text-light dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              OFERTAS
            </a>
            <ul class="dropdown-menu dropdown-menu" aria-labelledby="navbarDropdown">
              <li class="border-bottom" v-for="(m,x) in menu" :key="x"  @click="opcMenu = 'servicios'">
                <a class="dropdown-item" :href="path+'/servicios/'+m.id+'/'+m.slug">
                  {{ m.titulo }}
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item me-2 d-none">
            <a class="nav-link text-light" href="">EMPRESA</a>
          </li>
          
          <li class="nav-item me-2">
            <a class="nav-link  text-light" :href="path+'/sobre-nosotros'">
              CONTACTOS
            </a>
          </li>
          
        </ul>
      </div> 
  </div>

</template>

<script>
   import axios from 'axios';
  //import PieChart from './../amcharts/pie.vue';
  export default {
      props:{
          path:{type:String, default:''},
          id : {type:String, default:'0'}
      },

      data() {
          return {
              status: 'ini',
              menu :[], 
              opcMenu : 'home'           
          }
      },
      methods:{
          getMenu: function(){  
              axios.post(this.path+"/MenuServicios_vue").then(res => {
                  this.menu = res.data;  
                  console.log(this.menu);
              }).catch(err => {
                  //this.status = this.state.FAILED;
                  console.log(err);
              });
          }

      },
      mounted() {
          this.getMenu();
      }
  }
</script>
<style scoped>
  .colmin {width: 1%; white-space: nowrap; text-align: center}
  .loading {opacity: .45; pointer-events: none; user-select: none}
</style>
