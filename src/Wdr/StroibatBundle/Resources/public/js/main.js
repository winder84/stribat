/**
 * Created by ibragimovrt on 16.12.13.
 */
var current_slider_id = 1;

$(document).ready(function () {
	setInterval(slidersGo, 6000);
});

function slidersGo () {
	if(current_slider_id == 4) current_slider_id = 0;
	current_slider_id++;
	$('.sb_slider img:visible').fadeOut(500, function() {
		$('#slider_' + current_slider_id).fadeIn(500);
	});
	$('.sb_slider p:visible').fadeOut(500, function() {
		$('#slider_text_' + current_slider_id).fadeIn(500);
	});
};