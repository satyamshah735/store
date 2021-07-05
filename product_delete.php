<?php require_once("includes/initialize.php"); ?> 

<?php
if(isset($_GET['id']) && isset($_GET['image_name'])) 
    {

        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        
        if($image_name != "")
        {
            
            $path = "image/".$image_name;

            //Remove Image File from Folder
            $remove = unlink($path);

        }

        	//deleting product from db.
        	$del_obj=new Product;
			$del_obj->id=$id;
			$res=$del_obj->delete();

		if($res==true)
			{
				$session->message("Item deleted from Products List");
				redirect_to("product.php");
			}

	}

?>