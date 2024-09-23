<?php

require '../bootstrap.php';
require '../middleware/AuthMiddleware.php';

$auth=new AuthMiddleware();
$user=$auth->authenticate();

if($user){
    echo json_encode(array(
        'message'=>'Access granted',
        'user'=>$user->data
    ));
}else{
    echo json_encode(array('message'=>'Access denied'));
}
