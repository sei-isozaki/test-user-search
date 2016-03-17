<?php


// e.g getUserArray(1000000,80,1);
// 100万のうち、八割、約80万ユーザの配列を取得
function getRandArray($cnt, $rate,$seed){
	
	$ret = array();
	srand($seed);
	for($i = 1 ; $i < $cnt ; $i ++){
		if(rand(1,100) > (100 -$rate)){
			$ret[] = $i;
		}
	}
	return $ret;
}
