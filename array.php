<?php require_once("includes/initialize.php"); ?> 


<!-- this page is for practice purpose -->



<?php

$units = Units::find_all();
foreach ($units as $key) 
{
	echo "<pre>";
	print_r($key);
	echo "</pre>";


	// $a=$key->id;
	// $b=$key->name;

	// echo $a." ";
	// echo $b."<br>";

}

?> 

<!-- <?php

$prod= new Product;
print_r($prod);


?>  -->

<!-- <?php
$id=58;
$prod= new Product;
$prod->id=$id;
$prod->name="abc";
$res= $prod->delete();

echo "<pre>";
print_r($res);
echo "</pre>";



?> -->