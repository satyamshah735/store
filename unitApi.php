<?php require_once("includes/initialize.php"); 

//api to display all units

// $res = array();
// $units = Units::find_all();
// $count = count($units);
// $i=0;
// foreach ($units as $data) {
// 	$res[$i]['id'] = $data->id;
// 	$res[$i]['name'] = $data->name;
// 	$i++;
// }
// echo json_encode($res);exit;

$res = array();

$name = $_POST['name'];
if(isset($_POST['update_id']))
{
	$update_id = $_POST['update_id'];
}

if(empty($update_id))
{

       $data=new Units(); 
}
else
{
	$data = Units::find_by_id($update_id);
}
  //  $data->sn= $_POST['sn'];
    $data->name= $_POST['name'];
    if($data->save())
    {
    	$res['error'] = false;
    }
    else
    {
    	$res['error'] = true;
    }
    echo json_encode($res);exit;






