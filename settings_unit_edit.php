<?php require_once("includes/initialize.php"); 
//if(!$session->is_logged_in()){ redirect_to("logout.php");}?>

<?php
if(isset($_POST['submit']))
{
    $data= Units::find_by_id($_POST['id']); 
  //  $data->sn= $_POST['sn'];
    $data->name= $_POST['name'];
    if($data->save())
    {
    $session->message("success ||");
    redirect_to("settings_unit.php");
    }
}
$unit = Units::find_by_id($_GET['id']);
//print_r($unit);
?>


                        	<form method="post" enctype="multipart/form-data">
                                    	<table class="table table-bordered">
                                          
                                            <tr>
                                            <td>Unit Name :</td>
                                            <td><input type="text" id="topic_name" name="name" required="" value="<?php echo $unit->name; ?>"></td>
                                          </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td><input type="submit" name="submit" value="Edit" class="submithere"></td>
                                          </tr>
                                        </table>
                                            <input type="hidden" value="<?php echo $unit->id; ?>" name="id" />
                                    </form>
                                    

                   