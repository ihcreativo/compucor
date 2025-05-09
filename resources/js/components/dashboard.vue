<template>

  <div class="">
    <div class="btn btn-primary">
      hola
    </div>
     <!-- modal movimiento-->
    <div class="modal fade" id="ModalX" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            isaias
        </div>
    </div>
    <!-- Fin modal Movimiento -->  
  </div>

</template>

<script>
  // import axios from 'axios';
  //import PieChart from './../amcharts/pie.vue';
  export default {
      props:{
          path:{type:String, default:''},
          id : {type:String, default:'0'}
      },

      data() {
          return {
              status: 'ini',
              cliente :[
                {'cat':'Menu 1'},
                {'cat':'Menu 2'},
                {'cat':'Menu 3'},
                {'cat':'Menu 4'}
              ],            
          }
      },
      methods:{
          getCliente: function(){  
            
              // let fields =  new FormData();
              // fields.append('id',this.id);
              // axios.post(this.path+"/getCliente",fields).then(res => {
              //     this.cliente = res.data;  
              // }).catch(err => {
              //     this.status = this.state.FAILED;
              //     console.log(err);
              // });
          }

      },
      mounted() {
          this.getCliente();
      }
  }
</script>
<style scoped>
  .colmin {width: 1%; white-space: nowrap; text-align: center}
  .loading {opacity: .45; pointer-events: none; user-select: none}
</style>
