--TEST--
CairoContext->setSource() method
--SKIPIF--
<?php
if(!extension_loaded('cairo')) die('skip - Cairo extension not available');
?>
--FILE--
<?php
$surface = new CairoImageSurface(CAIRO_FORMAT_ARGB32, 50, 50);
var_dump($surface);

$context = new CairoContext($surface);
var_dump($context);

$pattern = new CairoSolidPattern(0.3, 0.3, 0.3);
var_dump($pattern);

$context->setSource($pattern);

var_dump($context->getSource()->getRGBA());

try {
    $context->setSource(new stdClass);
} catch (CairoException $e) {
    echo $e->getMessage();
}

?>
--EXPECTF--
object(CairoImageSurface)#%d (0) {
}
object(CairoContext)#%d (0) {
}
object(CairoSolidPattern)#%d (0) {
}
array(4) {
  ["red"]=>
  float(0.3)
  ["green"]=>
  float(0.3)
  ["blue"]=>
  float(0.3)
  ["alpha"]=>
  float(1)
}
CairoContext::setSource() expects parameter 1 to be CairoPattern, object given
