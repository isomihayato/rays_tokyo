$(document).ready(function(){

  var li_cascade = document.getElementById("cascade");

  var handleClick = function(e){
  li_cascade.appendChild('ul');
  document.getElementById('ul').textContent = "this is test";
};
  li_cascade.addEventListener('click',handleClick, false);

});
