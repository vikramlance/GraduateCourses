
<?php
include('../db/connection.php');
if(isset($_REQUEST['dl']))
{
	?>
		<thead>
                <tr>
                  <th>Image</th>
                  <th>Name</th>
				  <th>Department</th>
				  
                  <th>Available</th>
                  <th>Action</th>
										
                  
                  
                </tr>
                </thead>
				
                <tbody>
										<?php
											$sql = "SELECT * FROM `profile`";
												foreach ($dbh->query($sql) as $row)
												{
													//$user_id=$row['user_id'];
													
													$target='upload_image/'.$row['file'];
													//$targetPath = $_SERVER['DOCUMENT_ROOT'].'/harsh/'.'upload_image/'.$row['file'];
													
										?>										
               <tr>
									
									
									<td><img src="<?php echo $target; ?>" width="100px" height="100px"></td>
									<?php
									  $s1="SELECT `name` FROM `signup` WHERE id='".$row['staff_id']."'";
									  foreach ($dbh->query($s1) as $row1)
									  {
										  $name=$row1['name'];
									  }
									?>
									<td><h3><?php echo $name; ?></h3></td>
									<td><h3><?php echo $row['dept']; ?></h3></td> 
									<td><h3><?php echo $row['time_slot']; ?></h3></td>
									<td><h3><button  class="btn_up btn btn-primary"  value="<?php echo $row['staff_id']; ?>" >Book it</button></h3></td>
									
								</tr> 
								<?php	
										}
								?>	   
	
								</tbody>

	<?php
}
?>