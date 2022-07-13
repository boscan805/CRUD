<?php


$curlUrl = "https://fakestoreapi.com/products'";

$datos = array("title" => "test product",  "price" => 13.5, "description" => "lorem ipsum dolor", "image" => "https://i.pravatar.cc", "category" => "electroni");

$data_string = json_encode($datos);

$ch=curl_init($curlUrl);

curl_setopt($ch, CURLOPT_POST, true);

curl_setopt($ch, CURLOPT_POSTFIELDS, $datos);

curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);

curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));

             
$respuesta = curl_exec( $ch );


curl_close($ch);

echo $respuesta;






















/*$url = "https://fakestoreapi.com/products'";

$data = array("title" => "test product",  "price" => 13.5, "description" => "lorem ipsum dolor", "image" => "https://i.pravatar.cc", "category" => "electroni");

$data_string = json_encode($data);

$ch=curl_init($url);

curl_setopt($ch, CURLOPT_POST, true);

curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);

curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));

             
$response = curl_exec( $ch );


curl_close($ch);*/

 
?>



/*$fields = [
        'title' => 'test product',
        'price' => 13.5,
        'description' => 'lorem ipsum set',
        'image' => 'https://i.pravatar.cc',
        'category' => 'electronic'
        ];
        (json_encode($fields));
        $fields_string = http_build_query($fields);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://fakestoreapi.com/products");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string );
        $data = curl_exec($ch);
        $info = curl_getinfo($ch);
        dd(json_decode($data));
        curl_close($ch);*/