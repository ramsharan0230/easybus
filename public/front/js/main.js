$('#myModal').on('shown.bs.modal', function () {
	$('#myInput').trigger('focus')
})

 
		// jQuery("button.scroltop").on('click', function() {
		// 	jQuery("html, body").animate({
		// 		scrollTop: 0
		// 	}, 2000);
		// 	return false;
		// });

		jQuery(window).on("scroll", function() {
			var scroll = jQuery(window).scrollTop();
			if (scroll>50) {
				$(".top_header").addClass("header_fixed");
			} else {
				$(".top_header").removeClass("header_fixed");
			}
			// if (scroll > 700) {
			// 	jQuery("button.scroltop").fadeIn(1000);
			// } else {
			// 	jQuery("button.scroltop").fadeOut(1000);
			// }
		});
		


 




 
// $(document).ready(function(){
// 	 $(".register_slider").owlCarousel({
// 	 	loop:true,
// 		rewind: true,
// 		autoplay:true,
// 		autoplaySpeed: 1000,
// 		autoplayTimeout: 4000,
		 
// 		autoplayHoverPause: true,
// 		margin:20,
// 		nav:true,
// 		dots: true,
// 		// smartSpeed: 450,
// 		navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
// 		responsiveClass: true,
// 		responsive:{
// 			0:{
// 				items:1
// 			} 
// 		},
// 	 })
// })
 