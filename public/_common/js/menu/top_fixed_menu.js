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
	var headerHight = 60; //�w�b�_�̍���
	$('a[href^=#]').click(function(){
		var href= $(this).attr("href");
		var target = $(href == "#" || href == "" ? 'html' : href);
		var position = target.offset().top-headerHight; //�w�b�_�̍������ʒu�����炷
		$("html, body").animate({scrollTop:position}, 550, "swing");
		return false;
	});
});

