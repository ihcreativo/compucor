<template>
    <div>
      <editor
        api-key="h7m5lzr9otax7ptu5ei9nu3eeyc5ouehfpteif54vos8geua"
        v-model='texto'
        :init="{
          height: 400,
          menubar: false,
          plugins: 'lists link image',
          toolbar: 'undo redo | bold italic  | alignleft aligncenter alignright | bullist numlist outdent indent | table image link',
        }"
      ></editor>
      
      <!-- h7m5lzr9otax7ptu5ei9nu3eeyc5ouehfpteif54vos8geua -->
    </div>
  </template>
  
  <script>
  import Editor from '@tinymce/tinymce-vue';
  
  export default {
    components: {
      Editor
    },
    props:{
       
    },
    data() {
      return {
        texto: ''
      };
    },
    methods:{
      getText: function(){
        return this.texto;
      }
    }
  };
  </script>