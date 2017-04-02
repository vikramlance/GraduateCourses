$(document).ready(function() {

		var nm='all';
		$.ajax({ 
							type: "POST",
							url: "ajax/profile_data.php?nm="+nm,
							success: function(data)
							{
								var a=eval(data);
								$('#name').val(a[0]);
							}
		});

       var filename='';
		
         $('input[type="file"]').change(function(e){
            var filename = e.target.files[0].name;
			$('#file1').val(filename);      
        });
		
		

	$(document).on("click","#save",function()
		{
				
				var dept=document.getElementById('dept').value;
			   // var name=document.getElementById('name').value;
				var frm=document.getElementById('from').value;
				var to=document.getElementById('to').value;
				var t_slot=document.getElementById('t_slot').value;
				var m_start=document.getElementById('m_start').value;
				var m_end=document.getElementById('m_end').value;
				var a_start=document.getElementById('a_start').value;
				var a_end=document.getElementById('a_end').value;
				var e_start=document.getElementById('e_start').value;
				var e_end=document.getElementById('e_end').value;
				var file=document.getElementById('file1').value;;
				alert(file);
			
				//alert(m_id +' '+ p_id +' '+p_unit+' '+p_qty+' '+date+' '+bill_no+' '+party_nm+' '+mfi);
				
					$.ajax({ 
							type: "POST",
							url: "ajax/profile_data.php?dept="+dept+"&frm="+frm+"&to="+to+"&t_slot="+t_slot+"&m_start="+m_start+"&m_end="+m_end+"&a_start="+a_start+"&a_end="+a_end+"&e_start="+e_start+"&e_end="+e_end+"&file="+file,
							success: function(data)
							{
								//alert(data);
								$('#s').html(data);
								
								$('#f').html(data);
								$('#t').html(data);
								$('#t_s').html(data);
								$('#m_s').html(data);
								$('#m_e').html(data);
								$('#a_s').html(data);
								$('#a_e').html(data);
								$('#e_s').html(data);
								$('#e_e').html(data);
								
								
								$('#dept').val('0');
								$('#name').val('');
								$('#from').val('0');
								$('#to').val('0');
								$('#t_slot').val('0');
								
							}
						});	
				
		});
});