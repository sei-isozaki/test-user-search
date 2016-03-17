<?hh
namespace map;

// e.g getUserArray(1000000,80,1);
// 100万のうち、八割、約80万ユーザの配列を取得
class Test3{
	public static function getRandArray($cnt, $rate,$seed) : Map{
		
		$ret = Map{};
		srand($seed);
		for($i = 1 ; $i < $cnt ; $i ++){
			if(rand(1,100) > (100 -$rate)){
				$ret[$i] = $i;
			}
		}
		return $ret;
	}
}