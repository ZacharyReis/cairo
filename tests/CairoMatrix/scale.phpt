--TEST--
Cairo\Matrix->scale method
--SKIPIF--
<?php
if(!extension_loaded('cairo')) die('skip - Cairo extension not available');
?>
--FILE--
<?php
$matrix = new Cairo\Matrix();
var_dump($matrix);

$matrix->scale(0.1, 0.1);

/* Wrong number args */
try {
    $matrix->scale();
    trigger_error('We should bomb here');
} catch (Cairo\Exception $e) {
    echo $e->getMessage(), PHP_EOL;
}

/* Wrong number args 2 */
try {
    $matrix->scale(1);
    trigger_error('We should bomb here');
} catch (Cairo\Exception $e) {
    echo $e->getMessage(), PHP_EOL;
}

/* Wrong number args 3 */
try {
    $matrix->scale(1, 1, 1);
    trigger_error('We should bomb here');
} catch (Cairo\Exception $e) {
    echo $e->getMessage(), PHP_EOL;
}

/* Wrong arg type 1 */
try {
    $matrix->scale(array(), 1);
    trigger_error('We should bomb here');
} catch (Cairo\Exception $e) {
    echo $e->getMessage(), PHP_EOL;
}

/* Wrong arg type 2 */
try {
    $matrix->scale(1, array());
    trigger_error('We should bomb here');
} catch (Cairo\Exception $e) {
    echo $e->getMessage(), PHP_EOL;
}
?>
--EXPECTF--
object(Cairo\Matrix)#%d (0) {
}
Cairo\Matrix::scale() expects exactly 2 parameters, 0 given
Cairo\Matrix::scale() expects exactly 2 parameters, 1 given
Cairo\Matrix::scale() expects exactly 2 parameters, 3 given
Cairo\Matrix::scale() expects parameter 1 to be double, array given
Cairo\Matrix::scale() expects parameter 2 to be double, array given