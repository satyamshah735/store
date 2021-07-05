<h1>Update Product</h1>

<?php require_once("includes/initialize.php"); ?>

<?php
if(isset($_GET['id']))
{

$id=$_GET['id'];
$res=Product::find_by_id($id);

$name=$res->name;
$price=$res->price;
$current_image=$res->image;
$current_unitid=$res->unitid;
} 

?>

<form action="" method="POST" enctype="multipart/form-data">

	<input type="hidden" name="id" value="<?php echo $id;?>">
	<input type="hidden" name="current_image" value="<?php echo $current_image; ?>">

	Name:<br>
	<input type="text" name="name" value="<?php echo $name;?>"><br><br>

	Price:<br>
	<input type="number" name="price" value="<?php echo $price;?>"><br><br>

	Current Image:
	<?php
		if($current_image=="")
		{
			echo "Image not added <br><br>";
		}

		else
		{
			?>
			<br><br><img src="image/<?php echo $current_image; ?>" width="200px"><br><br>
			<?php
		}
	
	?>
	Upload New Image:
	<input type="file" name="image" ><br><br>
	Units:<br>
	<select name="unitid">
		
	<?php 
		$units = Units::find_all();
		
		foreach ($units as $data) 
			{
				$unit_id=$data->id;
				$unit_name=$data->name;
	?>
				<option <?php if($current_unitid==$unit_id) { echo "selected";} ?> value="<?php echo $data->id; ?>"><?php echo $data->name; ?></option>
	<?php
			
			}

	?>
	</select><br><br>

	<input type="submit" name="update" value="Update">

</form>

<?php

if(isset($_POST['update']))
{
	$id= $_POST['id'];
	$name= $_POST['name'];
	$price= $_POST['price'];
	$current_image= $_POST['current_image'];
	$unitid= $_POST['unitid'];


		if(isset($_FILES['image']['name']))
                {
                    //Upload BUtton Clicked
                    $image_name = $_FILES['image']['name']; //New Image NAme

                    //CHeck whether th file is available or not
                    if($image_name!="")
                    {
                        //IMage is Available
                        //A. Uploading New Image

                        //REname the Image
                        $ext = end(explode('.', $image_name)); //Gets the extension of the image

                        $image_name = "Product-".rand(0000, 9999).'.'.$ext; //THis will be renamed image

                        //Get the Source Path and DEstination PAth
                        $src_path = $_FILES['image']['tmp_name']; //Source Path
                        $dest_path = "image/".$image_name; //DEstination Path

                        //Upload the image
                        $upload = move_uploaded_file($src_path, $dest_path);

                        /// CHeck whether the image is uploaded or not
                        if($upload==false)
                        {
                            
                            redirect_to("product.php");
                            //Stop the Process
                            die();
                        }
                        //3. Remove the image if new image is uploaded and current image exists
                        //B. Remove current Image if Available
                        if($current_image!="")
                        {
                            //Current Image is Available
                            //REmove the image
                            $remove_path = "image/".$current_image;

                            $remove = unlink($remove_path);

                            //Check whether the image is removed or not
                            if($remove==false)
                            {
                               redirect_to("product.php");
                            //Stop the Process
                            die();
                            }
                        }
                    }
                    else
                    {
                        $image_name = $current_image; //Default Image when Image is Not Selected
                    }
                }
            else
              {
                    $image_name = $current_image; //Default Image when Button is not Clicked
              }



		$update= new Product;   //making new object of Product class

		$update->id= $id;
		$update->name= $name;
		$update->price= $price;
		$update->image=$image_name;
		$update->unitid= $unitid;

		if($update->update())
		{
		
			$session->message("Product updated successfully.");
			redirect_to("product.php");
		}

}

?>