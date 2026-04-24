$(document).ready(function(){
	$("body").ScrollToAnchors("slow");
	if($.browser.msie){
		if (navigator.appVersion < "7.0") {
			$("body.home #navigation li").hover(
				function(){
					$(this).add($(this).children("a")).addClass("jshover");
				},
				function(){
					$(this).add($(this).children("a")).removeClass("jshover");
				}
			);	
		}
	}
	var locate = new String(document.location);
	if (locate.search('#') != -1) {
		var locate_parts = locate.split('#');
		var story = $('#' + locate_parts[1]);
		if(story.size() > 0) {
			if(story.is('.funder')){
				story.siblings('div.funder').hide().end().ScrollTo('fast');
			}
		}
	}
});