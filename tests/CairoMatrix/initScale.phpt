--TEST--
Cairo\Matrix::initScale() method
--SKIPIF--
<?php
if(!extension_loaded('cairo')) die('skip - Cairo extension not available');
?>
--FILE--
<?php
$matrix = Cairo\Matrix::initScale(0.1, 0.1);
var_dump($matrix);

/* Wrong number args */
try {
    Cairo\Matrix::initScale();
    trigger_error('We should bomb here');
} catch (Cairo\Exception $e) {
    echo $e->getMessage(), PHP_EOL;
}

/* Wrong number args 2 */
try {
    Cairo\Matrix::initScale(1);
    trigger_error('We should bomb here');
} catch (Cairo\Exception $e) {
    echo $e->getMessage(), PHP_EOL;
}

/* Wrong number args 3 */
try {
    Cairo\Matrix::initScale(1, 1, 1);
    trigger_error('We should bomb here');
} catch (Cairo\Exception $e) {
    echo $e->getMessage(), PHP_EOL;
}

/* Wrong arg type 1 */
try {
    Cairo\Matrix::initScale(array(), 1);
    trigger_error('We should bomb here');
} catch (Cairo\Exception $e) {
    echo $e->getMessage(), PHP_EOL;
}

/* Wrong arg type 2 */
try {
    Cairo\Matrix::initScale(1, array());
    trigger_error('We should bomb here');
} catch (Cairo\Exception $e) {
    echo $e->getMessage(), PHP_EOL;
}
?>
--EXPECTF--
object(Cairo\Matrix)#%d (0) {
}
Cairo\Matrix::initScale() expects exactly 2 parameters, 0 given
Cairo\Matrix::initScale() expects exactly 2 parameters, 1 given
Cairo\Matrix::initScale() expects exactly 2 parameters, 3 given
Cairo\Matrix::initScale() expects parameter 1 to be double, array given
Cairo\Matrix::initScale() expects parameter 2 to be double, array given