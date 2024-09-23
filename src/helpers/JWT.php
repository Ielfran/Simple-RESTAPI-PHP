<?php
use \Firebase\JWT\JWT;
class JWTHandler{
    private $secret_key;

    public function __construct(){
        $this->secret_key=getenv('JWT_SECRET');
    }
    public function encode($payload){
        return JWT::encode($payload,$this->secret_key);
    }

    public function decode($jwt){
        try{
            return JWT::decode($jwt,$this->secret_key,array('HS256'));
        }catch(Exception $e){
            return null;
        }
    }
}
