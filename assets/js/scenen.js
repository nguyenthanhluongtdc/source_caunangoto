var isMobile = true;
if(!(/Android|iPhone|iPad|iPod|BlackBerry|Windows Phone/i).test(navigator.userAgent || navigator.vendor || window.opera)){
	isMobile = false;
}
//General site controls
$(function(){

	//toggle button
	$('.btn-toggle').click(function(){
		// get the target text 
		var target = $(this).attr('toggle-target');
		if(target){ // if the target is not empty
			//get the target object
			var target_ojbect = $(target);
			//get the state of current toggle anchor
			var state = $(this).attr('toggle-state');
			if(state){ //toggle already on
				$(this).attr('toggle-state', '');
				target_ojbect.attr('toggle-state', '');
				$(this).removeClass('on-toggled');
				target_ojbect.removeClass('on-toggled');
				// clear all related state
				$('.btn-toggle[toggle-target="'+target+'"]').each(function(){
					$(this).attr('toggle-state', '');
					$(this).removeClass('on-toggled');
				});
				if($(this).hasClass('modal-mode')){
					$('body').removeClass('on-modal');
				}
			}else{ // toggle is off

				$(this).attr('toggle-state','on');
				target_ojbect.attr('toggle-state', 'on');
				$(this).addClass('on-toggled');
				target_ojbect.addClass('on-toggled');
				// active all related state
				$('.btn-toggle[toggle-target="'+target+'"]').each(function(){
					$(this).attr('toggle-state', 'on');
					$(this).addClass('on-toggled');
				});
				if($(this).hasClass('modal-mode')){
					$('body').addClass('on-modal');
				}
			}
		}else{ //if the target is empty 
			alert('you have got no target son');
		}
	});

	//Social link - No longer being used
	$('#social-links').on('click', function(e) {
		var links = this;
		var social_list = $('#social-links .social-items');
		social_list.slideToggle('fast',stop());
		function stop(){
			if($(links).attr('toggle') == 'on'){
				$(links).removeClass('on-toggled');
				$(links).attr('toggle','');
			}else{
				$(links).addClass('on-toggled');
				$(links).attr('toggle','on');
			}
			social_list.stop(true, true);
		}

	}
	)
});

$(document).ready(function(){


	Pace.on('done',function(){

		//hide the load screen
		$('.load-screen').fadeOut(600);

		//initiate perspective scene
		!(function ($doc, $win) {
			var screenWidth = $win.screen.width / 2,
			screenHeight = $win.screen.height / 2,
			$elems = $doc.getElementsByClassName("scene-container"),
			validPropertyPrefix = '',
			otherProperty = 'perspective(1000px)',
			degX = 0,
			degY = 0;
			if($elems.length > 0){
				var elemStyle = $doc.getElementsByClassName("scene-container")[0].style;

				if(typeof elemStyle.webkitTransform == 'string') {
					validPropertyPrefix = 'webkitTransform';
				} else if (typeof elemStyle.MozTransform == 'string') {
					validPropertyPrefix = 'MozTransform';
				}

				if ( window.DeviceMotionEvent && isMobile) { 
					window.ondeviceorientation = function(event) {
						beta = event.beta;
						gamma = event.gamma;
						setTimeout(function(){
							normalizeData(gamma, beta)
						}, 50)
					}  
				}


				function normalizeData(_g, _b){

					b = Math.round(_b);
					g = Math.round(_g);

					degX = -g*.5;
					// degY = b*.2;
					// degY += (b - degY) *0.1;
					for(var $i = 0; $i < $elems.length; $i++){
						$elem = $elems[$i];
						$elem.style[validPropertyPrefix] = otherProperty + 'rotateY('+ degX +'deg)  rotateX('+ degY +'deg)';
					}

				}

				$doc.getElementById('page').addEventListener('mousemove',function (e){
					for(var $i = 0; $i < $elems.length; $i++){
						var centroX = e.clientX - screenWidth,
						centroY = screenHeight - (e.clientY + 13),
						degX = centroX * 0.009,
						degY = centroY * 0.009,
						$elem = $elems[$i];
						$elem.style[validPropertyPrefix] = otherProperty + 'rotateY('+ degX +'deg)  rotateX('+ degY +'deg)';
					}

				});	
				$doc.getElementById('page').addEventListener('mouseleave', function (e) {
					console.log('leave page');
					for(var $i = 0; $i < $elems.length; $i++){
						$elem = $elems[$i];
						$elem.style[validPropertyPrefix] = otherProperty + 'rotateY( 0deg)  rotateX(0deg)';

					}
				});
			}
		})(document, window);
	});

	//initiate the skrollr 	
	/*
	if(!(/Android|iPhone|iPad|iPod|BlackBerry|Windows Phone/i).test(navigator.userAgent || navigator.vendor || window.opera)){
		skrollr.init({
			edgeStrategy: 'set',
			forceHeight: false,
			smoothScrolling: false,
		});
	}
	*/


});

//smooth anchor scroll
$(function() {
	$('a[href*=#]:not([href=#])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				$('html,body').animate({
					scrollTop: target.offset().top
				}, 1000);
				return false;
			}
		}
	});
});


// Hide Header on on scroll down
var didScroll;
var lastScrollTop = 0;
var delta = 5;
var navbarHeight = $('.site-header').outerHeight();

$(window).scroll(function(event){
	didScroll = true;
});

setInterval(function() {
	if (didScroll) {
		hasScrolled();
		didScroll = false;
	}
}, 250);

function hasScrolled() {
	var st = $(this).scrollTop();

    // Make sure they scroll more than delta
    if(Math.abs(lastScrollTop - st) <= delta)
    	return;
    
    // If they scrolled down and are past the navbar, add class .nav-up.
    // This is necessary so you never see what is "behind" the navbar.
    if (st > lastScrollTop && st > navbarHeight){
        // Scroll Down
        $('.site-header').removeClass('nav-down').addClass('nav-up');
    } else {
        // Scroll Up
        if(st + $(window).height() < $(document).height()) {
        	$('.site-header').removeClass('nav-up').addClass('nav-down');
        }
    }
    
    lastScrollTop = st;
}