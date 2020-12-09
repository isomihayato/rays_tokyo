$(function() {
var nav = $('#nav');
var navTop = nav.offset().top;
$('li', nav).hover(function(){
$('ul',this).stop().slideDown('fast');
},
function(){
$('ul',this).stop().slideUp('fast');
});
});
