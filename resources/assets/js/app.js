Elixir.webpack.mergeConfig({
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


$(".btn-like").click(function(){
  alert('test')
})