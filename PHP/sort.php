<?php  
/**
 * 常见排序算法
 * X-Wolf
 * 2019-4-7
 */
class Sort
{
	// 冒泡排序
	static function bubble_sort($data)
	{
	    $count = count($data);
	    if ($count <= 1) return $data;

	    for($i = 0; $i < $count; $i++){
	        for($j = $i+1; $j < $count; $j++){
	            if ($data[$i] > $data[$j]){
	                $tmp = $data[$i];
	                $data[$i] = $data[$j];
	                $data[$j] = $tmp;
	            }
	        }
	    }

	    return $data;
	}

	// 快速排序
	static function quick_sort($data)
	{
		$count = count($data);
		if($count <= 1) return $data;

		$standard = $data[0];
		$leftData = $rightData = [];

		for($i = 1; $i < $count; $i++){
			if($data[$i] <= $standard){
				$leftData[]  = $data[$i];
			}else{
				$rightData[] = $data[$i];
			}
		}

		$leftData  = self::quick_sort($leftData);
		$rightData = self::quick_sort($rightData);

		return array_merge($leftData,(array)$standard,$rightData);
	}

}

$array = [3,435,2,12,4,3];
// $ret = Sort::bubble_sort($array);
$ret = Sort::quick_sort($array);
print_r($ret);