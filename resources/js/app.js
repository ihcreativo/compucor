import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;
Alpine.plugin(focus);
Alpine.start();

import Vue from 'vue';
window.Vue = Vue;

import dashboard from'./components/dashboard.vue';
import dashboard_contenido from'./components/dashboard_contenido.vue';
import dashboard_banners from'./components/dashboard_banners.vue';
import dashboard_setting from'./components/dashboard_setting.vue';
import TextArea from'./components/textarea.vue';
import menu_pagina from'./components/menu_pagina.vue';
import dashboard_catalogo from'./components/dashboard_catalogo.vue';
import productos_home from './components/productos_home.vue';
import productos_categorias from './components/productos_categorias.vue';
import producto_view from './components/producto_view.vue';
import menu_web from './components/menu_web.vue';

Vue.component('dashboard', dashboard);
Vue.component('dashboard_contenido', dashboard_contenido);
Vue.component('dashboard_banners', dashboard_banners);
Vue.component('dashboard_setting', dashboard_setting);
Vue.component('dashboard_catalogo', dashboard_catalogo);
Vue.component('TextArea', TextArea);
Vue.component('menu_pagina',menu_pagina);
Vue.component('productos_home',productos_home);
Vue.component('productos_categorias',productos_categorias);
Vue.component('producto_view',producto_view);
Vue.component('menu_web',menu_web);

const app = new Vue({
    el:'#app'
});
const mnu = new Vue({
    el:'#mnu'
});