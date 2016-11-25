<template>
  <div class="new-comments" id="new-comments">
    <div v-for="comment in comments" class="comment clearfix" id="comment">
      <div class="user">
        <div class="name">{{ comment.name }}</div>
      </div>
      <div class="body">
        <div class="text" v-text="comment.body"></div>
        <div class="date"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>{{ comment.created_at }}</div>
      </div>
    </div>
  </div>
</template>
<script>
var axios = require('axios');
module.exports = {
  data: function () {
    return {
      comments: []
    }
  }
}
</script>