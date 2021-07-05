
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
			$prod= new Product;
			$prod_list= Product::find_all();
			$count= Product::count_all();

			// echo "<pre>";
			// print_r($prod_list);
			// echo "</pre>";

			$sn=1;

			if($count>0)
			{
				foreach ($prod_list as $row) 

				{				                                     	
                	$id = $row->id;
                    $name = $row->name;
                    $price = $row->price;
                    $image_name = $row->image;
                    $unitid=$row->unitid;
													
	?>
					<tr style="text-align: center;">
						<td><?php echo $sn++; ?>.</td>
						<td><?php echo $name; ?></td>
						<td>Rs. <?php echo $price; ?></td>
						
						<td>
						
							<?php 

							$sql="SELECT * FROM units WHERE id=$unitid ";
							$unit_res= Units::find_by_sql($sql);
							 // print_r($unit_res);
							
								foreach ($unit_res as $unit_row) 
								{
									echo $unit_name=$unit_row->name;
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