<?php 

// 算法题

// 1.算出月初与月末的时间戳
function getBeginAndEndOfMonth($timestamp)
{
	return [
		strtotime(date('Y-m',$timestamp).'-1'),
		strtotime(date('Y-m',$timestamp).'-'.date('t',$timestamp))
	];
}
list($beginM,$endM) = getBeginAndEndOfMonth($time);



// 2.二维数组去重
$aa = array(
array('id' => 123, 'name' => '张三'),
array('id' => 123, 'name' => '李四'),
array('id' => 124, 'name' => '王五'),
array('id' => 123, 'name' => '李四'),
array('id' => 126, 'name' => '赵六')
);

// 1)内部的一维数组不能相同
function array_unique_fb($arr)
{
	$tmp = $data = [];
	foreach ($arr as $key => $value) {
		$tmp[] = implode(',',$value);
	}

	$ret = array_unique($tmp);

	foreach ($ret as $k => $v) {
		$data[$k] = explode(',',$v);
	}

	return $data;
}

// 2)一维数组中某额字段不能重复
// 二维数组中某个键值不能重复
function array_unique_key($arr,$key)
{
	$tmp = [];
	foreach ($arr as $k => $v) {
		if(isset($tmp[$v[$key]]) == false){
			$tmp[$v[$key]] = $v;
		}
	}

	return array_values($tmp);
}








