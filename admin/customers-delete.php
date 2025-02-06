<?php

require '../config/function.php';

$paraResultId = checkParamId('id');
if(is_numeric($paraResultId)){

    $customerId = validate($paraResultId);

    $customer = getById('customers', $customerId);
    if($customer['status'] == 200)
    {
      $response = delete('customers', $customerId);
      if($response)
      {
        redirect('customers.php','customer deleted');
      }
      else
      {
        redirect('customers.php','something went wrong');
      }
    }
    else
    {
        redirect('customers.php',$customer['message']); 
    }
  

}else{
    redirect('customers.php','something went wrong');
}

?>