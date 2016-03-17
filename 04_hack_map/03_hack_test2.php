<?hh

namespace map;

require_once  __DIR__ . '/test3.php';


const USER_CNT = 1000000;


var_dump( microtime(true));
ob_flush();
$t = microtime(true);
for ($i = 0 ; $i < 20 ; $i++){
	$id_list[] =  Test3::getRandArray(USER_CNT,80,$i);
}
echo  microtime(true) - $t;
ob_flush();

echo 'sec in GET USER LIST' . PHP_EOL;
$t = microtime(true);

$result = $id_list[0];
for ($i = 1 ; $i < 20 ; $i++){
//  	$result = array_intersect_key($result, $id_list[$i]);
	$result = Util::arrayIntersect($result, $id_list[$i]);
}
echo  microtime(true) - $t;
echo 'sec in array_intersect)' . PHP_EOL;
echo 'result user_count:'.count($result);
echo '' . PHP_EOL;

class Util{
	public static function arrayIntersect(Map $v1 , Map $v2){

		$it = $v1->keys();
		foreach($it as $v){
			if(!$v2->containsKey($v)){
				$v1->remove($v);
			}
		}
		return $v1;
	}
}