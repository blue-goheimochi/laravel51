window.jQuery = window.$ = require('jquery');
window.Tether = require("tether");
require("bootstrap");

window.Vue = require('vue');

var axios = require('axios');
/*
var axiosConfig = {
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
};
*/

/*
Vue.component('example', {
  template: '<script type="text/x-template" id="like-btn"><div><button type="button" class="btn btn-secondary btn-like" v-on:click="submit"><i class="fa fa-thumbs-o-up fa-fw" aria-hidden="true"></i> いいね！</button><div class="balloon"><p></p></div></div></script>'
});
*/
Vue.component('btn-like', require('./components/btnLike.vue'))
var likeTopic = new Vue({
  el: '#btn-like-wrap'
})