<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    # Delete // to check of working register_shutdown_function 
    require_once 'aaa.php'

    class MyException extends Exception {}

    function calc ($a,$b) {
 	if (!is_numeric($a)) {
            throw new MyException('First argument is not number');
        }
        if (!is_numeric($b)) {
            throw new MyException('Second argument is not number');
        }
        if (!$a) {
            throw new MyException('First argument is equal 0');
        }
        if (!$b) {
            throw new Exception('Second argument is equal 0');
        }

    echo $a,'*',$b,'=',$a*$b; 
    }

    $a=mt_rand(0,100);
    if (!$a%3) $a='String';
    $b=mt_rand(0,2);
    if (1==$b) $b='String';
    try {
 	calc ($a,$b);
    } catch (MyException $e) {
	echo "We catch the error of MyException: ". $e->getMessage(),'<br />';
    } catch (Exception $e) {
	echo "We catch the error of Exception: ". $e->getMessage(),'<br />';
    }
?>
