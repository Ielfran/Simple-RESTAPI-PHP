<?php
    require 'vendor/autoload.php';
    use Dotenv\Dotenv;

    $dotenv=Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    require_once 'src/config/Database.php';
    require_once 'src/models/User.php';

