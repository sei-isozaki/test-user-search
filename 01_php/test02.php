<?php

try {
$pdo = new PDO('mysql:host=localhost;dbname=usr;charset=utf8','root','',
array(PDO::ATTR_EMULATE_PREPARES => false));
} catch (PDOException $e) {
 exit('データベース接続失敗。'.$e->getMessage());
}

$t = microtime(true);

$jkn = array(
		"100" => 0 , // id:100のValueが5以上 AND
		"111" => 0 , // id:1100のValueが0以上 AND
		"110" => 0 ,
		"103" => 0 ,
);
$result = array();
foreach ($jkn as $key => $value){
	$sql = "select user_id from user_att where att_id =$key  and att_value >= $value ";
        $ids = array();
        foreach($pdo->query($sql) as $row){
            $ids[] = trim($row['user_id']);
        }
        echo "$key 条件では". count($ids) . "件のユーザがいます". PHP_EOL;
        $result[] = $ids;
}



echo  microtime(true) - $t;
echo 'sec in GET USER LIST' . PHP_EOL;
$t = microtime(true);

$hoge = array_intersect($result[0], $result[1], $result[2], $result[3]);
echo  microtime(true) - $t;
echo 'sec in array_intersect)' . PHP_EOL;
echo 'result user_count:'.count($hoge);
echo '';


