window.jQuery = window.$ = require('jquery');
window.Tether = require("tether");
require("bootstrap");

window.Vue = require('vue');

var axios = require('axios');

var btnLike = require('./components/btnLike.vue')
var topicComment = require('./components/topicComment.vue')

if(document.getElementById("btn-like-wrap")){
  new Vue({
    el: '#btn-like-wrap',
    components: {
      "btn-like": btnLike
    }
  })
}

if(document.getElementById("new-comments-wrap")){
  var newTopics = new Vue({
    el: '#new-comments-wrap',
    components: {
      "topic-comment": topicComment
    }
  })
  $('#btn-comment').click(function(){
    axios({
      method: 'post',
      url: '/topic/comment',
      headers: {'X-Requested-With': 'XMLHttpRequest'},
      data: {
        topic_id: $('#topic-id').val(),
        body: $('#comment-body').val()
      }
    })
    .then(function (response) {
      newTopics.$children[0].$data.comments.push({
        id: response.data.id,
        name: $('#comment-user-name').val(),
        body: response.data.body,
        created_at: response.data.created_at
      })
      $('#comment-body').val('')
      $('#comment-error').hide()
    })
    .catch(function (error) {
      $('#comment-error-message').text('コメントを入力してください')
      $('#comment-error').show()
    });
  })
}