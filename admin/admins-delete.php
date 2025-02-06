<?php

require '../config/function.php';

$paraResultId = checkParamId('id');
if(is_numeric($paraResultId)){

    $adminId = validate($paraResultId);

    $admin = getById('admins', $adminId);
    if($admin['status'] == 200)
    {
      $adminDeleteRes = delete('admins', $adminId);
      
      if($adminDeleteRes)
      {
        redirect('admins.php','admin deleted');
      }
      else
      {
        redirect('admins.php','something went wrong');
      }
    }
    else
    {
        redirect('admins.php',$admin['message']); 
    }
    //echo $adminId;

}else{
    redirect('admins.php','something went wrong');
}

?>