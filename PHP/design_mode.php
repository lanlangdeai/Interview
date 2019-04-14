<?php 

// 常用设计模式

/**
 * 单例模式
 */
trait singleton{

	private static $instance = null;

	// 私有方法,不允许外部实例化
	private function __construct(){}

	// 获取实例
	public static function getInstance()
	{
		if(is_null(self::$instance) ){
			self::$instance = new static;
		}
		return self::$instance;
	}

	// 防止实例被克隆
	private function __clone(){}

	// 防止被序列化
	private function __wakeup(){}

}
