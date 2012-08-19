$(document).ready(function (e) {
	
	function addCredits() {
		
		var total = 0;
		$("#lp-credit-list").find("input:checkbox").each(​​​​​​​​​​​​​​​​function() {
			total += parseInt(this.value, 10);
		});
		$("#num_credits").html(total);
	}
	addCredits();
	
	$("#lp-credit-list input:checkbox").change( function() { 
		addCredits();
	});
	
});