#CBOR encoder for PHP
--------
Decoder/encoder from PHP data to CBOR binary string. This code has been developed and maintained by Ven at January 2014.

CBOR is an object representation format defined by the [IETF](http://ietf.org).
The [specification](http://tools.ietf.org/html/rfc7049)
has recently been approved as an IETF Standards-Track specification
and has been published as RFC 7049.

## Installation
Add `2tvenom/cborencode` as a requirement to composer.json:

```JavaScript
{
    "require": {
       "2tvenom/cborencode": "1.0.0"
    }
}
```
## Usage
```php
<?php
include("vendor/autoload.php");

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
```

## Compatibility

Checked with [Ruby extension](https://github.com/cabo/cbor-ruby) in encode and decode

## Known issues

- Not support tags. 6 major type *(in future)*
- Not support 16 and 32 floats encoding *(maybe in future)*
- All floats will be serialized only as IEEE 754 Double-Precision Float (64 bits follow)
- Encode does't support indefinite-length values.
