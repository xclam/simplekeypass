$(".clickable").on("click", function() {
	var href = $(this).data("href");
	window.location.href = href;
});

$("#share-with-all").on("click", function() {
	$('#share-with').find('input:checkbox').each(function(){
		$(this).prop( "checked", true );
	});
});

$("#share-with-nobody").on("click", function() {
	$('#share-with').find('input:checkbox').each(function(){
		$(this).prop( "checked", false );
	});
});

$('.copy').on("click", function() {
	var $elt = $("#" + $(this).attr('data-copy'));
	// var $temp = $("<input>");
	// $("body").append($temp);
	// $elt.focus();
	// $elt.select();
	// $elt.setSelectionRange(0, 99999);
	// document.execCommand("copy");
	navigator.clipboard.writeText($elt.val());

}); 

$('.field-protected').on('focus', function(){
	$(this).attr("type","text");
});

$('.field-protected').on('blur', function(){
	$(this).attr("type","password");
});