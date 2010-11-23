--TEST--
Cairo\Surface\Image->getStride() method
--SKIPIF--
<?php
if(!extension_loaded('cairo')) die('skip - Cairo extension not available');
?>
--FILE--
<?php
$surface = new Cairo\Surface\Image(Cairo\Format::ARGB32, 50, 50);
var_dump($surface);

var_dump($surface->getStride());

/* Wrong number args */
try {
    $surface->getStride('foo');
    trigger_error('We should bomb here');
} catch (Cairo\Exception $e) {
    echo $e->getMessage(), PHP_EOL;
}
?>
--EXPECTF--
object(Cairo\Surface\Image)#%d (0) {
}
int(200)
Cairo\Surface\Image::getStride() expects exactly 0 parameters, 1 given