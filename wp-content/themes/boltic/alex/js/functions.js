$(document).ready(function() {

		// Här kommer vi att göra något
		// med mobilmenyn. Gör inget förutom alert atm.
		$("#btn-mobile-open").click(function() {
			alert("hej");
		});

 		// Slidetoggle för att visa kommentarer på var enskild nyhet.
 		$("#showComments").click(function() {
 			$("#comments").slideToggle();
 		});

 		// Stänga off canvas från canvasen.
 		$("#menuTablet").click(function() {
 			$.sidr('close', 'sidr');
 		});
 		
});