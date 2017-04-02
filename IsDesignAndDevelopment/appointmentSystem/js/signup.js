$(document).ready(function() {

	$(document).on("click","#signup_save",function()
		{
				
				var type=document.getElementById('type').value;
			    var name=document.getElementById('name').value;
				var uin=document.getElementById('uin').value;
				var email=document.getElementById('email').value;
				var pass1=document.getElementById('pass1').value;
				var pass2=document.getElementById('pass2').value;
				
			
				//alert(m_id +' '+ p_id +' '+p_unit+' '+p_qty+' '+date+' '+bill_no+' '+party_nm+' '+mfi);
				
					$.ajax({ 
							type: "POST",
							url: "ajax/signup_data.php?type="+type+"&name="+name+"&uin="+uin+"&email="+email+"&pass1="+pass1+"&pass2="+pass2,
							success: function(data)
							{
								//alert(data);
								$('#t').html(data);
								$('#n').html(data);
								$('#u').html(data);
								$('#e').html(data);
								$('#p1').html(data);
								$('#p2').html(data);
								
								
								$('#type').val('0');
								$('#name').val('');
								$('#uin').val('');
								$('#email').val('');
								$('#pass1').val('');
								$('#pass2').val('');
								
							}
						});	
				
		});

});