--TEST--
cairo_status_to_string function
--SKIPIF--
<?php
if(!extension_loaded('cairo')) die('skip - Cairo extension not available');
?>
--FILE--
<?php
$surface = cairo_image_surface_create(CAIRO_FORMAT_ARGB32, 50, 50);
var_dump($surface);

$context = cairo_create($surface);
var_dump($context);

var_dump(cairo_status_to_string(cairo_status($context)));

cairo_status_to_string();
cairo_status_to_string(1, 1);
cairo_status_to_string(array());
?>
--EXPECTF--
object(Cairo\Surface\Image)#%d (0) {
}
object(Cairo\Context)#%d (0) {
}
string(7) "success"

Warning: cairo_status_to_string() expects exactly 1 parameter, 0 given in %s on line %d

Warning: cairo_status_to_string() expects exactly 1 parameter, 2 given in %s on line %d

Warning: cairo_status_to_string() expects parameter 1 to be long, array given in %s on line %d