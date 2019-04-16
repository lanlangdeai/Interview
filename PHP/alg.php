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


