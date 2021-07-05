<?php require_once("includes/initialize.php"); ?> 

<?php
if(isset($_POST['submit']))
{
    
    if(isset($_FILES['image']['name']))
                
            {
                    //Get the details of the selected image
                    $image_name = $_FILES['image']['name'];

                    //Check Whether the Image is Selected or not and upload image only if selected
                    if($image_name!="")
                    {
                        // Image is SElected
                        //A. REnamge the Image
                        //Get the extension of selected image (jpg, png, gif, etc.) 
                        $ext = end(explode('.', $image_name));

                        // Create New Name for Image
                        $image_name = "Product-".rand(0000,9999).".".$ext; //New Image Name May Be "Product-657.jpg"

                        //B. Upload the Image
                        //Get the Src Path and DEstinaton path

                        // Source path is the current location of the image
                        $src = $_FILES['image']['tmp_name'];

                        //Destination Path for the image to be uploaded
                        $dst = "image/".$image_name;

                        //Finally Upload the product image
                        $upload = move_uploaded_file($src, $dst);

                        //check whether image uploaded or not
                        if($upload==false)
                        {
                            //Failed to Upload the image
                            //REdirect to product Page                     
                            redirect_to('product_add.php');
                            //STop the process
                            die();
                        }

                    }

                }
                else
                {
                    $image_name = ""; //SEtting DEfault Value as blank
                }


    $data=new Product(); 
 	    
    $data->name= $_POST['name'];
    $data->price= $_POST['price'];
    $data->image= $image_name;
    $data->unitid= $_POST['unitid'];

    if($data->create())
    {
    $session->message("Product Added Successfully");
    //header("Location: http://www.example.com/another-page.php");
    redirect_to("product.php");
    }
}

?>


<h1>Add Product</h1>

<form action="" method="POST" enctype="multipart/form-data">

	Name:<br>
	<input type="text" name="name" required="" placeholder="Enter product name"><br><br>

	Price:<br>
	<input type="number" name="price" required="" placeholder="Enter product price"><br><br>

	Upload Image:
	<input type="file" name="image" ><br><br>
	Units:<br>
	<select name="unitid">
		
	<?php 
		$units = Units::find_all();
		$i=0;
		foreach ($units as $data) 
			{
	?>
				<option value="<?php echo $data->id; ?>"><?php echo $data->name; ?></option>
	<?php
				$i++;
			}

	?>
	</select><br><br>

	<input type="submit" name="submit" value="Save">

</form>