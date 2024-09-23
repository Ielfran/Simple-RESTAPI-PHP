<?php

echo json_encode(array('message'=>'welcome to the REST API'));
try {
    $pdo = new PDO('mysql:host=localhost;dbname=forms', 'root', '');
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

