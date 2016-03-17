<?php
require_once  __DIR__ . '/test.php';

const USER_CNT = 1000000;
ini_set('memory_limit', '2524M');
$t = microtime(true);
$result = array();
for ($i = 0 ; $i < 20 ; $i++){
$id_list[] =  getRandArray(USER_CNT,80,$i);
}
echo  microtime(true) - $t;


echo 'sec in GET USER LIST' . PHP_EOL;
$t = microtime(true);

$result = $id_list[0];
for ($i = 1 ; $i < 20 ; $i++){
	$result = array_intersect($result, $id_list[$i]);
}
echo  microtime(true) - $t;
echo 'sec in array_intersect)' . PHP_EOL;
echo 'result user_count:'.count($result);
echo '' . PHP_EOL;


