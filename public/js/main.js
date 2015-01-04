$(document).on('ready', function()
{

	$('.cilindro').on('click', function()
	{
		var self = $(this);

		$('.panel-front', self).css({
			"backface-visibility": "hidden",
			"z-index": "5"
		});

		$('article', self).css({
			"transform": "rotateY(360deg)"
		});

	});

});