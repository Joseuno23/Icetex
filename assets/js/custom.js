(function($) {
	"use strict";


	// ______________Active Class
	$(".app-sidebar .toggle-menu.side-menu a").each(function() {
		var pageUrl = window.location.href.split(/[?#]/)[0];
		if (this.href == pageUrl) {
			$(this).addClass("active");
			$(this).parent().addClass("active"); // add active to li of the current link
			$(this).parent().parent().prev().addClass("active"); // add active class to an anchor
			$(this).parent().parent().prev().click(); // click the item to make it drop
		}
	});

	// ______________Cover Image
	$(".cover-image").each(function() {
		var attr = $(this).attr('data-image-src');
		if (typeof attr !== typeof undefined && attr !== false) {
			$(this).css('background', 'url(' + attr + ') center center');
		}
	});


	// ______________Ms Menu Trigger
	$(function(e) {
		if ($('#ms-menu-trigger')[0]) {
			$('body').on('click', '#ms-menu-trigger', function() {
				$('.ms-menu').toggleClass('toggled');
			});
		}
	});

	// ______________Full Screen
	$(document).on("click", ".fullscreen-button", function toggleFullScreen() {
		if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
			if (document.documentElement.requestFullScreen) {
				document.documentElement.requestFullScreen();
			} else if (document.documentElement.mozRequestFullScreen) {
				document.documentElement.mozRequestFullScreen();
			} else if (document.documentElement.webkitRequestFullScreen) {
				document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
			} else if (document.documentElement.msRequestFullscreen) {
				document.documentElement.msRequestFullscreen();
			}
		} else {
			if (document.cancelFullScreen) {
				document.cancelFullScreen();
			} else if (document.mozCancelFullScreen) {
				document.mozCancelFullScreen();
			} else if (document.webkitCancelFullScreen) {
				document.webkitCancelFullScreen();
			} else if (document.msExitFullscreen) {
				document.msExitFullscreen();
			}
		}
	})

	// ______________ PAGE LOADING
	$(window).on("load", function(e) {
		$("#global-loader").fadeOut("slow");
	})

	// ______________ BACK TO TOP BUTTON
	$(window).on("scroll", function(e) {
		if ($(this).scrollTop() > 0) {
			$('#back-to-top').fadeIn('slow');
		} else {
			$('#back-to-top').fadeOut('slow');
		}
	});
	$(document).on("click", "#back-to-top", function(e) {
		$("html, body").animate({
			scrollTop: 0
		}, 600);
		return false;
	});

	const DIV_CARD = 'div.card';
	// ______________Tooltip
	$('[data-toggle="tooltip"]').tooltip();

	// ______________Popover
	$('[data-toggle="popover"]').popover({
		html: true
	});

	// ______________Remove Card
	$(document).on('click', '[data-toggle="card-remove"]', function(e) {
		let $card = $(this).closest(DIV_CARD);
		$card.remove();
		e.preventDefault();
		return false;
	});

	// ______________Card Collapse
	$(document).on('click', '[data-toggle="card-collapse"]', function(e) {
		let $card = $(this).closest(DIV_CARD);
		$card.toggleClass('card-collapsed');
		e.preventDefault();
		return false;
	});

	// ______________Card Fullscreen
	$(document).on('click', '[data-toggle="card-fullscreen"]', function(e) {
		let $card = $(this).closest(DIV_CARD);
		$card.toggleClass('card-fullscreen').removeClass('card-collapsed');
		e.preventDefault();
		return false;
	});

	// ______________Search
	$('body, .navbar-collapse form[role="search"] button[type="reset"]').on('click keyup', function(event) {
		if (event.which == 27 && $('.navbar-collapse form[role="search"]').hasClass('active') ||
		$(event.currentTarget).attr('type') == 'reset') {
			closeSearch();
		}
	});
	function closeSearch() {
		var $form = $('.navbar-collapse form[role="search"].active')
		$form.find('input').val('');
		$form.removeClass('active');
	}
	$(document).on('click', '.navbar-collapse form[role="search"]:not(.active) button[type="submit"]', function(event) {
		event.preventDefault();
		var $form = $(this).closest('form'),
		$input = $form.find('input');
		$form.addClass('active');
		$input.focus();
	});
	$(document).on('click', '.navbar-collapse form[role="search"].active button[type="submit"]', function(event) {
		event.preventDefault();
		var $form = $(this).closest('form'),
		$input = $form.find('input');
		$('#showSearchTerm').text($input.val());
		closeSearch()
	});

	

	/*Skin modes*/

	//$('body').addClass('light-mode');//
	//$('body').addClass('dark-mode');//
	//$('body').addClass('body-default');//
	//$('body').addClass('body-style1');//
	//$('body').addClass('horizontal-light');//
	//$('body').addClass('horizontal-color');//
	//$('body').addClass('horizontal-dark');//
	//$('body').addClass('horizontal-gradient');//
	//$('body').addClass('reset');//
	//$('body').addClass('leftmenu-light');//
	//$('body').addClass('leftmenu-color');//
	//$('body').addClass('leftmenu-dark');//
	//$('body').addClass('leftmenu-gradient');//

	/*-- Pattern--*/
	//$('body').addClass('pattern1');//
	//$('body').addClass('pattern2');//
	//$('body').addClass('pattern3');//
	//$('body').addClass('pattern4');//
	//$('body').addClass('pattern5');//
	//$('body').addClass('pattern6');//
	//$('body').addClass('pattern7');//
	//$('body').addClass('pattern8');//
	//$('body').addClass('pattern9');//
	//$('body').addClass('pattern10');//

	/*-- Leftmenu Bg-image--*/
	//$('body').addClass('leftbgimage1');//
	//$('body').addClass('leftbgimage2');//
	//$('body').addClass('leftbgimage3');//
	//$('body').addClass('leftbgimage4');//
	//$('body').addClass('leftbgimage5');//



})(jQuery);