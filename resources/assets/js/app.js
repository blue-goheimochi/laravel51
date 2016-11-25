window.jQuery = window.$ = require('jquery');
window.Tether = require("tether");
require("bootstrap");

window.Vue = require('vue');

Vue.component('btn-like', require('./components/btnLike.vue'))

if(document.getElementById("btn-like-wrap")){
  var likeTopic = new Vue({
    el: '#btn-like-wrap'
  })
}