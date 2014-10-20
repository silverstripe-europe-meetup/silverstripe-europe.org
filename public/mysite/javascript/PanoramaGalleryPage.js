


(function($) {
	$(function () {
		$(".panorama").panorama_viewer({
			repeat: false,              // The image will repeat when the user scroll reach the bounding box. The default value is false.
			direction: "horizontal",    // Let you define the direction of the scroll. Acceptable values are "horizontal" and "vertical". The default value is horizontal
			animationTime: 700,         // This allows you to set the easing time when the image is being dragged. Set this to 0 to make it instant. The default value is 700.
			easing: "ease-out",         // You can define the easing options here. This option accepts CSS easing options. Available options are "ease", "linear", "ease-in", "ease-out", "ease-in-out", and "cubic-bezier(...))". The default value is "ease-out".
			overlay: true               // Toggle this to false to hide the initial instruction overlay
		});

	});
})(jQuery);


