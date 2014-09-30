<?php
include("src/CBOR/CBOREncoder.php");
include("src/CBOR/CBORExceptions.php");
include("src/CBOR/Types/CBORByteString.php");

//target for encode
$target = array(true, array("variable1" => 100000, "variable2" => "Hello, World!", "Hello!"), 0.234, 0, null, 590834290589032580);

//encoded string
$encoded_data = \CBOR\CBOREncoder::encode($target);

//debug info output
$byte_arr = unpack("C*", $encoded_data);

echo "Byte hex map = " . implode(" ", array_map(function($byte){
        return "0x" . strtoupper(dechex($byte));
    }, $byte_arr)) . PHP_EOL;

echo "Byte dec map = " . implode(" ", $byte_arr) . PHP_EOL;

//decode
$decoded_variable = \CBOR\CBOREncoder::decode($encoded_data);
//output
var_dump($decoded_variable);
