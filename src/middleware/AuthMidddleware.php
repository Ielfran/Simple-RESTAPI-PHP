<?php
require '../helpers/JWT.php';

class AuthMiddleware{
    public function authenticate(){
        $headers=apache_request_headers();
        $authHeader=isset($headers['Authorization'])?$headers['Authorization']:null;
        if($authHeader){
            $jwt=trim(str_replace('Bearer','',$authHeader));
            $jwtHandler=new JWTHandler();
            $decoded=$jwtHandler->decode($jwt);

            if($decoded){
                return $decoded;
            }
        }
        return false;
    }
}
