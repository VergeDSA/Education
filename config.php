<?php
	$PROJECT_PHP_SERVER=array('development','production',0);
	putenv("PROJECT_PHP_SERVER=".$PROJECT_PHP_SERVER[mt_rand(0,2)]);
	$dbConfig = require 'default/db.php';
	$dir    = 'default/';
//	$scanned_directory = array_diff(scandir($dir), array('..', '.','db.php'));
	$config = $dbConfig;
	foreach (scandir($dir) as $file) {
		if ($file=="." or $file=="..") continue; 
		$config[$file] = substr($dir,0,-1);
	} 

	echo $dir = getenv("PROJECT_PHP_SERVER"),'</br>';
	if ($dir) {
		$dbConfig = require $dir.'/db.php';
		foreach($dbConfig as $name=>$var) {
			$config[$name]=$dbConfig[$name];	
		}

	}
       foreach (scandir($dir.'/') as $file) {
                if ($file=="." or $file=="..") continue;
                $config[$file] = $dir;
        } 



print_r($config);
?>
