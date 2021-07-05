
<h1 style="text-align: center;">List of Products</h1>


<?php require_once("includes/initialize.php"); ?> 

<a href="product_add.php"> <input type="button" name="product" value="Add Product" style="margin-left: 80%"></a><br><br>
<table border="1" cellpadding="5px" cellspacing="0px" style="margin-left:auto;margin-right:auto; width:80%;">

<tr>
	<th>S.No.</th>
	<th>Product Name</th>
	<th>Price</th>
	<th>Unit</th>
	<th>Product Image</th>
	<th>Actions</th>
</tr>


	<?php
			$data_obj=new MySQLDatabase;
			$sql="SELECT * FROM product";
			$res=$data_obj->query($sql);
			$count= Product::count_all();

			$sn=1;

			if($count>0)
			{
				while($row=mysqli_fetch_assoc($res))
				{
                    
                      	//get the values from individual columns
                        $id = $row['id'];
                        $name = $row['name'];
                        $price = $row['price'];
                        $image_name = $row['image'];
                        $unitid=$row['unitid'];
				
				
				
									
	?>
					<tr style="text-align: center;">
						<td><?php echo $sn++; ?>.</td>
						<td><?php echo $name; ?></td>
						<td>Rs. <?php echo $price; ?></td>
						<td>
						
						<?php 
						// echo $unitid;
						$prod_obj=new MySQLDatabase;
						$sql2="SELECT * FROM units where id=$unitid";
						$res2=$prod_obj->query($sql2);
						while($row2=mysqli_fetch_assoc($res2))
						{
							$unit_name= $row2['name'];
							echo $unit_name;
						}
						 
						

						?>	

						</td>

						<td>
						<?php
					
							if($image_name=='')
							{
								echo "Image not added";
							}
							else
							{
								?>
									<img src="image/<?php echo $image_name; ?>"width="80px"  >
								<?php

							}
						?>
						</td>
						
                        <td>
                        	<a href="product_update.php?id=<?php echo $id;?>&image_name=<?php echo $image_name ?>">Edit</a> &nbsp&nbsp&nbsp&nbsp
                        	<a href="product_delete.php?id=<?php echo $id;?>&image_name=<?php echo $image_name ?>">Delete</a>

                        </td>
                    </tr>

					<?php

					}
				
                }
                ?>

</table>