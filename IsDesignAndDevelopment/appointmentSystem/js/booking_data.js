$(document).ready(function() {

	var dl='all';
								$.ajax({ 
										type: "POST",
										url: "ajax/booking_data.php?dl="+dl,
										success: function(data)
										{
											//alert("gsdfgpjn");
											$("#example1").html(data);	
											
												$("#example1").DataTable();
										}
								});

});