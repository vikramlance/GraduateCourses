$(document).ready(function() {

		$(document).on("click","#login",function()
		{
			var u_no=document.getElementById('u_no').value;
			var user_email=document.getElementById('user_email').value;
			
			$.ajax({ 
							type: "POST",
							url: "ajax/signin_data.php?u_no="+u_no+"&user_email="+user_email,
							success: function(data)
							{
								//alert(data);
								$('#msg1').html(data);
								$('#uin').html(data);
								$('#email').html(data);
								
								$('#u_no').val('');
								$('#user_email').val('');
								
							}
						});	
		});
});