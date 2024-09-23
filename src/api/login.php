<?php
require '/home/gagan/rest/bootstrap.php';
$data=json_decode(file_get_contents('php://input'));

$database=new Database();
$d=$database->getConnection();

$user=new User();
$user->email=$data->email;
$user->password=$data->password;

if($user->login()){
    $jwtHandle=new JWTHandler();
    $payload=array(
        'iss'=>'http://localhost',
        'aud'=>'http://localhost',
        'iat'=>time(),
        'exp'=>time()+300,
        'data'=>array(
          'id'=>$user->id,
            'name'=>$user->name,
            'email'=>$user->email
        )
    );
    $jwt=$jwtHandler->encode($payload);

    echo json_encode(array(
        'message'=>'Login success',
        'token'=>sjwt
    ));
}else{
    echo json_encode(array('message'=>'Login Failed'));
}
