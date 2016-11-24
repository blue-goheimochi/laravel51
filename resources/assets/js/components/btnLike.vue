<template>
  <div id="btn-like">
    <button type="button" class="btn btn-secondary btn-like" v-on:click="submit" v-bind:class="{ active: isLiked }"><i class="fa fa-thumbs-o-up fa-fw" aria-hidden="true"></i> いいね！</button>
    <div class="balloon"><p>{{ counter }}</p></div>
  </div>
</template>
<script>
var axios = require('axios');
module.exports = {
  data: function () {
    return {
      counter: this.count,
      isLiked: this.like
    }
  },
  props: ['count', 'like'],
  methods: {
    submit: function(event) {
      var vm = this
      var method = this.isLiked ? 'delete' : 'put'
      axios({
        method: method,
        url: '/topic/like',
        headers: {'X-Requested-With': 'XMLHttpRequest'},
        data: {
          topic_id: $('#topic_id').val()
        }
      })
      .then(function (response) {
        if( vm.isLiked ) {
          vm.isLiked = false
          vm.counter = parseInt(vm.counter) - 1
        } else {
          vm.isLiked = true
          vm.counter = parseInt(vm.counter) + 1
        }
        $(".btn-like").blur()
      })
      .catch(function (error) {
        $(".btn-like").blur()
        cnosole.log(error)
      });
    }
  }
}
</script>