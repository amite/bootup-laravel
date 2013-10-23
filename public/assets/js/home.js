$(document).ready(function(){
	
	$.get( 'ajax', function( data ) {
		$('#home-content').html(data.content).show(400);
	});
});