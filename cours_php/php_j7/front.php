<?php

$json = file_get_contents("http://localhost:8080/service.php");

$data = json_decode($json,true);

echo "<pre>";
print_r($data);
echo "</pre>";

?>