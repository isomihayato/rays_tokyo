$(function(){
	$('a[href^="#"]').click(function() {
		var speed = 400;
		var href= $(this).attr("href");
		var target = $(href == "#" || href == "" ? 'html' : href);
		var position = target.offset().top;

		$('body,html').animate({scrollTop:position}, speed, 'linear');
			return false;
	});
});
// pagetop
$(function() {

	var pagetop = $('.page_top_fix');

	pagetop.hide();

	$(window).scroll(function () {
		if ($(this).scrollTop() > 600) {
			pagetop.fadeIn();
		} else {
			pagetop.fadeOut();
		}
	});

});
