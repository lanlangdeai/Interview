<?php  

// 常见排序


// 1.冒泡排序
function bubble_sort($data)
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
function quick_sort($data)
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

	$leftData  = quick_sort($leftData);
	$rightData = quick_sort($rightData);

	return array_merge($leftData,(array)$standard,$rightData);
}

$array = [3,435,2,12,4,3];
// $ret = bubble_sort($array);
$ret = quick_sort($array);
var_dump($ret);