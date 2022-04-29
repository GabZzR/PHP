<?php

// $data = ["foo","bar",121,512,5.7,true,false,["baz",73],"oof" => 69];

// $json = json_encode($data);

// $filepath = __DIR__ . DIRECTORY_SEPARATOR . "data" . DIRECTORY_SEPARATOR . "data";

// $filepath = implode(DIRECTORY_SEPARATOR,[__DIR__,"data","data.json"]);

// $size = file_put_contents("data.json",$json);

// echo $size;

// $json = file_get_contents($filepath);

// $data = json_decode($json);

// print_r($data);

// $serialized = serialize($data);

// echo $serialized;

// file_put_contents($filepath, $serialized);

// $serialized = file_get_contents($filepath);

// $data = unserialize($serialized);

// echo "<pre>";
// print_r($data);
// echo"</pre>";

$data = 512;

$filepath = implode(DIRECTORY_SEPARATOR,[__DIR__,"data","data.txt"]);

file_put_contents($filepath,$data);

?>