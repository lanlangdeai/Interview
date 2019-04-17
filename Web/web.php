<?php 

/**
 * 限制之string方式实现 
 * 注:使用事务防止,设置了自增之后,操作过期没有成功,则该key将永久存在
 */
function time_limit(userId) {
	if (EXISTS times:{userId} == 1)
	var times = INCR times:{userId}
	if times > 99
		return -1
	else
		MULTI
		INCR times:{userId}
		//此处，如果不加事务，竞态条件可能出现
		EXPIRE times:{userId},60
	EXEC
	return 1
}

/**
 * 限制之list方式
 * 队列长度是否超过频次的上限,小于则加入队列并返回成功,
 * 否则,取出最初的时间与当前时间做对比,60秒之内已经超出上限则频繁调用,
 * 否则,加入最新的,移除最老的护具
 */
function time_limit(userId) {
	var times = LEN times:{userId}
	if (times < 100)
		LPUSH times:{userId}, now()
		return 1
	else
		var early = LINDEX times:{userId}, -1
		if (now() - early < 60) 
			return -1
		else 
			LPUSH times:{userId}, now()
			RPOP times:{userId}
		return 1
}
