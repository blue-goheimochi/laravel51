/*Elixir.webpack.mergeConfig({
  plugins: [
    new webpack.ProvidePlugin({
      $: "jquery",
      jQuery: "jquery",
      "window.jQuery": "jquery",
    }),
  ],
});
import "jquery";
import "bootstrap";
*/
window.jQuery = window.$ = require('jquery');
window.Tether = require("tether");
require("bootstrap");

$(".btn-like").click(function(){
  alert('test')
});