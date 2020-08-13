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
	var elt = "#" + $(this).attr('data-copy');
	var $temp = $("<input>");
	$("body").append($temp);
	$temp.val($(elt).text()).select();
	document.execCommand("copy");
	$temp.remove();

	$(elt).addClass('bg-info').delay(2000).queue(function(){
		$(this).removeClass('bg-info');
		$(this).dequeue();
	});
}); 