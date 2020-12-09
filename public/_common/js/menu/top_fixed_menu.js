jQuery(function($) {
  
var nav    = $('#fixedBox'),
    offset = nav.offset();
  
$(window).scroll(function () {
  if($(window).scrollTop() > offset.top) {
    nav.addClass('fixed');
  } else {
    nav.removeClass('fixed');
  }
});
  
});

$(function () {
	var headerHight = 60; //ヘッダの高さ
	$('a[href^=#]').click(function(){
		var href= $(this).attr("href");
		var target = $(href == "#" || href == "" ? 'html' : href);
		var position = target.offset().top-headerHight; //ヘッダの高さ分位置をずらす
		$("html, body").animate({scrollTop:position}, 550, "swing");
		return false;
	});
});

