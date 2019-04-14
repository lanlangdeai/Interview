<?php  
/**
 * 门面模式（Facade）又称外观模式，用于为子系统中的一组接口提供一个一致的界面。
 */

interface OsInterface
{
	// 关闭
	public function halt();
}

interface BiosInterface
{
	// 执行
	public function execute();

	public function waitForKeyPress();

	public function launch(OsInterface $os);

	public function powerDown();
}








