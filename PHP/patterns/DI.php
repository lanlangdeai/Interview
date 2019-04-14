<?php 
// DI(depend Inject) 依赖注入

// 抽象类
abstract class AbstractConf
{
	protected $storage;

	public function __construct($storage)
	{
		$this->storage = $storage;
	}
}

// 参数接口
interface Parameters
{
	public function get($key);

	public function set($key,$value);
}


class ArrayConf extends AbstractConf implements Parameters
{

	// 获取参数
	public function get($key, $default='')
	{
		if(isset($this->storage[$key])){
			return $this->storage[$key];
		}
		return $default;
	}

	// 设置参数
	public function set($key, $value)
	{
		$this->storage[$key] = $value;
	}
}


// 连接类
class Connection
{
	protected $config;

	protected $host;

	public function __construct(Parameters $config)
	{
		$this->config = $config;
	}

	public function connect()
	{
		$host = $this->config->get('host');	
		$this->host = $host;
	}

	public function getHost()
	{
		return $this->host;
	}
}


// 测试内容

$source = include 'config.php';
$config = new ArrayConf($source);

$connection = new Connection($config);
$connection->connect();
echo $connection->getHost();










