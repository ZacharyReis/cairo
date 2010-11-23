--TEST--
Cairo\Matrix::initTranslate function
--SKIPIF--
<?php
if(!extension_loaded('cairo')) die('skip - Cairo extension not available');
?>
--FILE--
<?php
$matrix = Cairo\Matrix::initTranslate(0.1, 0.1);
var_dump($matrix);

/* Wrong number args */
try {
    Cairo\Matrix::initTranslate();
    trigger_error('We should bomb here');
} catch (Cairo\Exception $e) {
    echo $e->getMessage(), PHP_EOL;
}

/* Wrong number args 2 */
try {
    Cairo\Matrix::initTranslate(1);
    trigger_error('We should bomb here');
} catch (Cairo\Exception $e) {
    echo $e->getMessage(), PHP_EOL;
}

/* Too many args */
try {
    Cairo\Matrix::initTranslate(1, 1, 1);
    trigger_error('We should bomb here');
} catch (Cairo\Exception $e) {
    echo $e->getMessage(), PHP_EOL;
}

/* Bad arg type */
try {
    Cairo\Matrix::initTranslate(array(), 1);
    trigger_error('We should bomb here');
} catch (Cairo\Exception $e) {
    echo $e->getMessage(), PHP_EOL;
}

/* Bad arg type 2*/
try {
    Cairo\Matrix::initTranslate(1, array());
    trigger_error('We should bomb here');
} catch (Cairo\Exception $e) {
    echo $e->getMessage(), PHP_EOL;
}
?>
--EXPECTF--
object(Cairo\Matrix)#%d (0) {
}
Cairo\Matrix::initTranslate() expects exactly 2 parameters, 0 given
Cairo\Matrix::initTranslate() expects exactly 2 parameters, 1 given
Cairo\Matrix::initTranslate() expects exactly 2 parameters, 3 given
Cairo\Matrix::initTranslate() expects parameter 1 to be double, array given
Cairo\Matrix::initTranslate() expects parameter 2 to be double, array given