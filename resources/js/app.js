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
Vue.component('dashboard', dashboard);
Vue.component('dashboard_contenido', dashboard_contenido);
Vue.component('dashboard_banners', dashboard_banners);
Vue.component('dashboard_setting', dashboard_setting);
Vue.component('TextArea', TextArea);
Vue.component('menu_pagina',menu_pagina);

const app = new Vue({
    el:'#app'
});