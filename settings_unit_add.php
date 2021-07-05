<?php require_once("includes/initialize.php"); 
//if(!$session->is_logged_in()){ redirect_to("logout.php");}?>

<?php
if(isset($_POST['submit']))
{
    $data=new Units(); 
  //  $data->sn= $_POST['sn'];
    $data->name= $_POST['name'];
    if($data->create())
    {
    $session->message(" success ||");
    //header("Location: http://www.example.com/another-page.php");
    redirect_to("settings_unit.php");
    }
}

//$units = Units::find_all();
?>
<!-- js ends -->

</head>

<body>
  
                        	<form method="post" enctype="multipart/form-data">
                                    	<table class="table table-bordered">
                                          
                                            <tr>
                                            <td>Unit Name</td>
                                            <td><input type="text" id="" name="name" required></td>
                                          </tr>

                                          <!-- <tr>
                                            <td>Unit Name</td>
                                            <td>
                                                <select name="unit_id">
                                                    <?php foreach($units as $data):?>
<option value="<?= $data->id ?>"><?php echo $data->name; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </td>
                                          </tr> -->
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td><input type="submit" name="submit" value="save" class="submithere" ></td>
                                          </tr>
                                        </table>

                                    </form>
                                    

                     