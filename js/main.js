jQuery(document).ready(function($) {
	"use strict";	
	var siteMenuClone = function() {
		$('.js-clone-nav').each(function() {
			var $this = $(this);
			$this.clone().attr('class', 'site-nav-wrap').appendTo('.site-mobile-menu-body');
		});
		setTimeout(function() {	
			var counter = 0;
      $('.site-mobile-menu .has-children').each(function(){
        var $this = $(this);
        $this.prepend('<span class="arrow-collapse collapsed">');
        $this.find('.arrow-collapse').attr({
          'data-toggle' : 'collapse',
          'data-target' : '#collapseItem' + counter,
        });
        $this.find('> ul').attr({
          'class' : 'collapse',
          'id' : 'collapseItem' + counter,
        });
        counter++;
      });
    }, 1000);
		$('body').on('click', '.arrow-collapse', function(e) {
      var $this = $(this);
      if ( $this.closest('li').find('.collapse').hasClass('show') ) {
        $this.removeClass('active');
      } else {
        $this.addClass('active');
      }
      e.preventDefault();       
    });
		$(window).resize(function() {
			var $this = $(this),
				w = $this.width();
			if ( w > 768 ) {
				if ( $('body').hasClass('offcanvas-menu') ) {
					$('body').removeClass('offcanvas-menu');
				}
			}
		})
		$('body').on('click', '.js-menu-toggle', function(e) {
			var $this = $(this);
			e.preventDefault();
			if ( $('body').hasClass('offcanvas-menu') ) {
				$('body').removeClass('offcanvas-menu');
				$this.removeClass('active');
			} else {
				$('body').addClass('offcanvas-menu');
				$this.addClass('active');
			}
		}) 
		// click outisde offcanvas
		$(document).mouseup(function(e) {
	    var container = $(".site-mobile-menu");
	    if (!container.is(e.target) && container.has(e.target).length === 0) {
	      if ( $('body').hasClass('offcanvas-menu') ) {
					$('body').removeClass('offcanvas-menu');
				}
	    }
		});
	}; 
	siteMenuClone();
/*Pozadina slajder*/
	$('.set-bg').each(function() {
		var bg = $(this).data('setbg');
		$(this).css('background-image', 'url(' + bg + ')');
	});
/*prijavi se*/
$("PrijaviSe").click(function() {
	$.ajax({
		url: "login.php",
		type: "get",
		success: function(data) {
			if (data == "1") {
				$("p1").html("Uneto korisničko ime ne postoji.");
			}
		}
	});
});
/*Ajax*/
	$.ajaxSetup({ cache: false });
	$('#search').keyup(function(){
	 $('#result').html('');
	 $('#state').val('');
	 var searchField = $('#search').val();
	 var expression = new RegExp(searchField, "i");
	 $.getJSON('data.json', function(data) {
	  $.each(data, function(key, value){
	   if (value.naziv.search(expression) != -1 || value.opis.search(expression) != -1)
	   {
		$('#result').append('<li class="list-group-item link-class"><img src="'+value.link1+'" height="40" width="40" class="img-thumbnail" /> '+value.naziv+' | <span class="text-muted">'+value.opis+'</span></li>');
	   }
	  });   
	 });
	});
	
	$('#result').on('click', 'li', function() {
	 var click_text = $(this).text().split('|');
	 $('#search').val($.trim(click_text[0]));
	 $("#result").html('');
	 location.href = 'galerija.php?rez='+$.trim(click_text[0]);
	});
/*Forma*/
$('#logreg-forms #btn-signup').click(toggleSignUp);
$('#logreg-forms #cancel_signup').click(toggleSignUp);
function toggleSignUp(e){
    e.preventDefault();
    $('#logreg-forms .form-signin').toggle(); 
    $('#logreg-forms .form-signup').toggle(); 
}
/*Hero*/
	var sliderCount;
	$(".hero-slider").on("initialized.owl.carousel", function(e) {
		sliderCount = e.item.count;
		if( sliderCount < 10) {
			sliderCount = "0" + sliderCount;
		}
	}).owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        items: 1,
        dots: false,
        animateOut: 'fadeOut',
    	animateIn: 'fadeIn',
		navText: ['<img src="images/icons/arrow-left-white.png" alt="">', '<img src="images/icons/arrow-right-black.png" alt="">'],
        smartSpeed: 1200,
		autoplay: true,
		mouseDrag: false
    }).on("changed.owl.carousel", function(e) {
		var Index = e.item.index - 1;
		var Count = e.item.count;
		var PreIndex = Index - 1;
		var NextIndex = Index + 1;
		if(PreIndex < 0) {
			PreIndex = Count - 1;
		}
		if(PreIndex < 1) {
			PreIndex = Count;
		}
		if (PreIndex < 10) {
			PreIndex = "0" + PreIndex;
		}
		if(NextIndex > Count) {
			NextIndex = 1;
		}
		if (NextIndex < 10) {
			NextIndex = "0" + NextIndex;
		}
		$(".hero-slider .owl-nav button.owl-prev").html('<img src="images/icons/arrow-left-white.png" alt=""> <span> '+ PreIndex +'</span> ');
		$(".hero-slider .owl-nav button.owl-next").html('<span> '+ NextIndex +' </span> <img src="images/icons/arrow-right-black.png" alt="">');
	});
	$(".hero-slider .owl-nav button.owl-prev").html('<img src="images/icons/arrow-left-white.png" alt=""> <span> '+ sliderCount +'</span> ');
	$(".hero-slider .owl-nav button.owl-next").html('<span>02</span> <img src="images/icons/arrow-right-black.png" alt="">');
});
