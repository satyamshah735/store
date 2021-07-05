<?php require_once("includes/initialize.php"); 
//if(!$session->is_logged_in()){ redirect_to("logout.php");}
	$units = Units::find_all();
//   echo '<pre>';
// print_r($units);
//   echo '</pre>';exit;
	?>
  




<body>
  
                                      <br><br>
                                      <a href="settings_unit_add.php?>"><input type="button" name="add" value="Add Unit"></a><br><br>
                                    	<table class="table table-bordered">
                                          <tr>
                                          	
                                            <th>SN</th>
                                            <th>Name</th>
                                            <th>Action</th>

                                          </tr>
                                          <?php $i = 1; foreach($units as $data):
                                          //$unit = Unit::find_by_id($data->unit_id);
                                           ?>
                                                    <tr>
                                                        <td> <?php echo ($i); ?></td>
                                                        <td><?php echo $data->name;?></td>
                                                        <td><a href="settings_unit_edit.php?id=<?php echo $data->id; ?>">Edit</a></td>
                                                        <td><a href="settings_unit_delete.php?id=<?php echo $data->id; ?>">Delete</a></td>
                                                    </tr>
                                                
                                          <?php $i++; endforeach; ?>
                                        </table>
