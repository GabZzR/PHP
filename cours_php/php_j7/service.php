<?php

$data = [
    "foo" => "oof",
    "bar" => 512,
    "baz" => true
];

header("Content-Type:application/json");
echo json_encode($data);

?>