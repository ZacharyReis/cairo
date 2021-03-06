--TEST--
CairoScaledFont->getFontFace() method
--SKIPIF--
<?php
if(!extension_loaded('cairo')) die('skip - Cairo extension not available');
?>
--FILE--
<?php
include(dirname(__FILE__) . '/create_toyfont.inc');
var_dump($fontface);
$matrix1 = new CairoMatrix(1);
$matrix2 = new CairoMatrix(1,1);
$fontoptions = new CairoFontOptions();

$scaled = new CairoScaledFont($fontface, $matrix1, $matrix2, $fontoptions);
var_dump($scaled);

$face2 = $scaled->getFontFace();
var_dump($face2);

var_dump($face2 == $fontface);

/* Wrong number args */
try {
    $scaled->getFontFace('foo');
    trigger_error('status requires only one arg');
} catch (CairoException $e) {
    echo $e->getMessage(), PHP_EOL;
}
?>
--EXPECTF--
object(CairoToyFontFace)#%d (0) {
}
object(CairoScaledFont)#%d (0) {
}
object(CairoToyFontFace)#%d (0) {
}
bool(true)
CairoScaledFont::getFontFace() expects exactly 0 parameters, 1 given