<?php

require '../config/function.php';

$paraResultId = checkParamId('id');
if(is_numeric($paraResultId)){

    $productId = validate($paraResultId);

    $product = getById('products', $productId);
    if($product['status'] == 200)
    {
      $response = delete('products', $productId);
      if($response)
      {
        $deleteImage="../".$product['data']['image'];
        if(file_exists($deleteImage)){
            unlink($deleteImage);

        }
        redirect('products.php','product deleted');
      }
      else
      {
        redirect('products.php','something went wrong');
      }
    }
    else
    {
        redirect('products.php',$category['message']); 
    }
  

}else{
    redirect('products.php','something went wrong');
}

?>