(function( $ ) {

    //Function to animate slider captions 
	function doAnimations( elems ) {
		//Cache the animationend event in a variable
		var animEndEv = 'webkitAnimationEnd animationend';
		
		elems.each(function () {
			var $this = $(this),
				$animationType = $this.data('animation');
			$this.addClass($animationType).one(animEndEv, function () {
				$this.removeClass($animationType);
			});
		});
	}
	
	//Variables on page load 
	var $myCarousel = $('#carousel-example-generic'),
		$firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");
		
	//Initialize carousel 
	$myCarousel.carousel();
	
	//Animate captions in first slide on page load 
	doAnimations($firstAnimatingElems);
	
	//Pause carousel  
	$myCarousel.carousel('pause');
	
	
	//Other slides to be animated on carousel slide event 
	$myCarousel.on('slide.bs.carousel', function (e) {
		var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
		doAnimations($animatingElems);
	});  
    $('#carousel-example-generic').carousel({
        interval:3000,
        pause: "false"
    });

    





});	


function validateForm() {
	
    
	var x = document.forms["personal-details"]["resident"].value;
    if (x == "") {
        
		$(".erro1").text("Resident must be filled out");

        return false;
    }
	
	var y = document.forms["personal-details"]["citizen"].value;
    if (y == "") {
      
		$(".erro2").text("Citizen must be filled out");
        return false;
    }
	var z = document.forms["personal-details"]["fname"].value;
    if (z == "") {
       
		$(".erro3").text("First Name must be filled out");
        return false;
    }
	var a = document.forms["personal-details"]["address"].value;
    if (a == "") {
      
		$(".erro4").text("Residential address must be filled out");
        return false;
    }
	var b = document.forms["personal-details"]["mobile"].value;
    if (b == "") {
        
		$(".erro5").text("Mobile must be filled out");
        return false;
    }
    /*var c = document.forms["personal-details"]["depositfund"].value;
    if (c == "") {
       
		$(".erro6").text("Deposit Amount must be filled out");
        return false;
    }*/
	var d = document.forms["personal-details"]["terms"].value;
    if (d == "") {
       
		$(".erro7").text("Terms must be filled out");
        return false;
    }
    
}







