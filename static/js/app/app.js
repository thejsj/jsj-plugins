// remap jQuery to $
(function($){})(window.jQuery);

/* trigger when page is ready */
$(document).ready(function (){
	// Disqus
	DISQUS.reset({
		reload: true,
		config: function () {  
			this.page.identifier = "thejsj";  
			this.page.url = 'http://thejsj.com' + event.value;
		}
	});

	if(createJSJGallerySlideshow !== undefined){
		createJSJGallerySlideshow();
	}
	if(createJSJCodeHighlight !== undefined){
		createJSJCodeHighlight();
	}
});

/* 

--------------------------------------
Window onload trigger - if needed
--------------------------------------
$(window).load(function() {

});

--------------------------------------
Window resize trigger - if needed
--------------------------------------
$(window).resize(function() {
	
});

*/