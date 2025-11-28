jQuery(document).ready(function ($) {

	$('.software_slider').slick({
		dots: false,
		arrows: false,
		infinite: true,
		autoplay: true,
		speed: 300,
		centerMode: true,
		slidesToShow: 5,
		slidesToScroll: 1,
		responsive: [
			{
				breakpoint: 1480,
				settings: {
					slidesToShow: 4,
					slidesToScroll: 3,
					centerMode: true,
					infinite: true
				}
			},
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 2,
					centerMode: true,
					infinite: true
				}
			},
			{
				breakpoint: 900,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 1,
					centerMode: true
				}
			},
			{
				breakpoint: 767,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					centerMode: true
				}
			},
			{
				breakpoint: 580,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					centerMode: true
				}
			},
			{
				breakpoint: 380,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					centerMode: false
				}
			}
		]
	});


	$('.thr_review_slider').slick({
		dots: false,
		infinite: true,
		autoplay: true,
		arrows: false,
		speed: 300,
		centerMode: false,
		slidesToShow: 1,
		slidesToScroll: 1
	});

	$('.txt_slider').slick({
		dots: false,
		infinite: true,
		arrows: false,
		variableWidth: true,
		slidesToShow: 5,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 0,
		speed: 8000,
		pauseOnHover: false,
		cssEase: 'linear'
	});


	$('.tools_slider').slick({
		dots: false,
		arrows: false,
		infinite: true,
		autoplay: true,
		speed: 300,
		centerMode: false,
		slidesToShow: 8,
		slidesToScroll: 1,
		responsive: [
			{
				breakpoint: 1800,
				settings: {
					slidesToShow: 6,
					slidesToScroll: 1,
					infinite: true,
					dots: false
				}
			},
			{
				breakpoint: 1400,
				settings: {
					slidesToShow: 4,
					slidesToScroll: 1,
					dots: false
				}
			},
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 1,
					dots: false
				}
			},
			{
				breakpoint: 800,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
					dots: false
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
					dots: false
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					dots: false
				}
			}
		]
	});

	$(".fm_toggle").click(function () {

		let parentCol = $(this).closest(".foo_col");

		parentCol.find(".menu_wrap").slideToggle();
		$(".foo_col").not(parentCol).find(".menu_wrap").slideUp();

		// Icon rotation
		parentCol.find(".fm_toggle i").toggleClass("rotate");
		$(".foo_col").not(parentCol).find(".fm_toggle i").removeClass("rotate");

	});

	$('.custom_header .desk-top-trigger a.hamburger').click(function () {
		$('body').toggleClass('side-nav-open');
	});

	$('.thr_mobile_menu .logo_close_wrap span.mobclose_icon').click(function () {
		$('body').removeClass('side-nav-open');
		$('.ctdropdown_menu').slideUp();
	});

	$('.thr_mobile_menu .mob_menu_inner ul > li.has_children > a').click(function (e) {
		e.preventDefault();
		$(this).next('.ctdropdown_menu').slideToggle();
	});
});
