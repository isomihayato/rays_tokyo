$(function(){
	$(".accordion dd:not(:first)").after().hide();
	$(".accordion dt.accordion").click(function(){
		$(this).next().slideToggle();
	});
	$(".accordion dd .close").click(function(){
		$(this).parent().slideToggle();
	});
});
