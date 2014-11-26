(function($) { "use strict";

	
	//Navigation	

	$('ul.slimmenu').on('click',function(){
		var width = $(window).width(); 
		if ((width <= 800)){ 
			$(this).slideToggle();}	
	});	
	
	$('ul.slimmenu').slimmenu(
	{
		resizeWidth: '800',
		collapserTitle: '',
		easingEffect:'easeInOutQuint',
		animSpeed:'medium',
		indentChildren: true,
		childrenIndenter: '&raquo;'
	});	


	//Responsive video
	
	$(".video-container").fitVids();


	// Switcher CSS 
	  $(document).ready(function() {
	"use strict";
		$("#hide, #show").click(function () {
			if ($("#show").is(":visible")) {
			   
				$("#show").animate({
					"margin-left": "-300px"
				}, 300, function () {
					$(this).hide();
				});
				
				$("#switch").animate({
					"margin-left": "0px"
				}, 300).show();
			} else {
				$("#switch").animate({
					"margin-left": "-300px"
				}, 300, function () {
					$(this).hide();
				});
				$("#show").show().animate({
					"margin-left": "0"
				}, 300);
			}
		});
						  
	});	
	

  })(jQuery); 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 





	