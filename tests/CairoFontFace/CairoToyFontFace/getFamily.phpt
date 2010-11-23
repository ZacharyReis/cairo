--TEST--
Cairo\FontFace\Toy::getFamily() method
--SKIPIF--
<?php
if(!extension_loaded('cairo')) die('skip - Cairo extension not available');
if(!class_exists('Cairo\FontFace\Toy')) die('skip - Cairo\FontFace\Toy not enabled');
?>
--FILE--
<?php
// Test with all parameters
$c = new Cairo\FontFace\Toy("sans-serif", Cairo\Font\Slant::NORMAL, Cairo\Font\Weight::NORMAL);
var_dump($c->getFamily());
?>
--EXPECTF--
string(10) "sans-serif"
