
(function ($) {
    "use strict";
})(jQuery);

$('.i-btn').on('click', function(){
	var base_url = window.location.href+$(this).parent().data('url');
	var $temp = $("<input>");
	$("body").append($temp);
  	$temp.val(base_url).select();
  	document.execCommand("copy");
  	$temp.remove();
});

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});