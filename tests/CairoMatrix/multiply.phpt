--TEST--
Cairo\Matrix::multiply method
--SKIPIF--
<?php
if(!extension_loaded('cairo')) die('skip - Cairo extension not available');
?>
--FILE--
<?php
$matrix1 = new Cairo\Matrix(0.1, 0.1);
$matrix2 = new Cairo\Matrix(0.1);

var_dump(Cairo\Matrix::multiply($matrix1, $matrix2));

/* Wrong number args */
try {
    Cairo\Matrix::multiply();
    trigger_error('We should bomb here');
} catch (Cairo\Exception $e) {
    echo $e->getMessage(), PHP_EOL;
}

/* Wrong number args 2*/
try {
    Cairo\Matrix::multiply(1);
    trigger_error('We should bomb here');
} catch (Cairo\Exception $e) {
    echo $e->getMessage(), PHP_EOL;
}

/* Wrong number args 3*/
try {
    Cairo\Matrix::multiply(1, 1, 1);
    trigger_error('We should bomb here');
} catch (Cairo\Exception $e) {
    echo $e->getMessage(), PHP_EOL;
}

/* Wrong arg type 1*/
try {
    Cairo\Matrix::multiply(1, $matrix2);
    trigger_error('We should bomb here');
} catch (Cairo\Exception $e) {
    echo $e->getMessage(), PHP_EOL;
}

/* Wrong arg type 2*/
try {
    Cairo\Matrix::multiply($matrix1, 1);
    trigger_error('We should bomb here');
} catch (Cairo\Exception $e) {
    echo $e->getMessage(), PHP_EOL;
}
?>
--EXPECTF--
object(Cairo\Matrix)#%d (0) {
}
Cairo\Matrix::multiply() expects exactly 2 parameters, 0 given
Cairo\Matrix::multiply() expects exactly 2 parameters, 1 given
Cairo\Matrix::multiply() expects exactly 2 parameters, 3 given
Cairo\Matrix::multiply() expects parameter 1 to be Cairo\Matrix, integer given
Cairo\Matrix::multiply() expects parameter 2 to be Cairo\Matrix, integer given