<?php
namespace linger\framework;
final class Application
{
	/**
	 * @var Application
	 */
	protected static $_app;
	/**
	 * @var Config
	 */
	protected $_config;
	/**
	 * @var Router
	 */
	protected $_router;
	/**
	 * @var Dispatcher
	 */
	protected $_dispatcher;
	/**
	 * @return void
	 */
	public static function autoload() { }
	/**
	 * @return void
	 */
	public function __construct(array $aconfig) { }
	/**
	 * @return void
	 */
	public static function app() { }
	/**
	 * @param Bootstrap $bootclasses
	 * @return void
	 */
	public function init($bootclasses) { }
	/**
	 * @return void
	 */
	public function run() { }
	/**
	 * @return Config
	 */
	public function getConfig() { }
	/**
	 * @return Router
	 */
	public function getRouter() { }
	/**
	 * @return Dispatcher
	 */
	public function getDispatcher() { }
}
interface Bootstrap
{
	/**
	 * @param Application $app
	 * @return void
	 */
	public function bootstrap($app);
}
final class Config implements \Iterator,\ArrayAccess,\Countable
{
	/**
	 * @var self
	 */
	protected static $_instance;
	/**
	 * @var Config
	 */
	protected $_config;
	/**
	 * @param Config $config
	 * @return void
	 */
	public function __construct($config) { }
	/**
	 * @return void
	 */
	private function __clone() { }
	/**
	 * @return void
	 */
	private function __sleep() { }
	/**
	 * @return void
	 */
	private function __wakeup() { }
	/**
	 * @param string $key
	 */
	public function get($key) { }
	/**
	 * @param string $key
	 * @param string $val
	 * @return void
	 */
	public function set($key, $val) { }
	/**
	 * @param string $key
	 * @return void
	 */
	public function has($key) { }
	/**
	 * @param string $key
	 * @return void
	 */
	public function del($key) { }
	/**
	 * @return void
	 */
	public function count() { }
	/**
	 * @return void
	 */
	public function rewind() { }
	/**
	 * @return void
	 */
	public function next() { }
	/**
	 * @return void
	 */
	public function current() { }
	/**
	 * @return void
	 */
	public function key() { }
	/**
	 * @return void
	 */
	public function valid() { }
	/**
	 * @return void
	 */
	public function clear() { }
	/**
	 * @param string $key
	 * @return void
	 */
	public function offsetGet($key) { }
	/**
	 * @param string $key
	 * @param string $val
	 * @return void
	 */
	public function offsetSet($key, $val) { }
	/**
	 * @param string $key
	 * @return void
	 */
	public function offsetExists($key) { }
	/**
	 * @param string $key
	 * @return void
	 */
	public function offsetUnset($key) { }
	/**
	 * @param string $key
	 * @return void
	 */
	public function __get($key) { }
	/**
	 * @param string $key
	 * @param string $val
	 * @return void
	 */
	public function __set($key, $val) { }
	/**
	 * @param string $key
	 * @return void
	 */
	public function __isset($key) { }
	/**
	 * @param string $key
	 * @return void
	 */
	public function __unset($key) { }
	/**
	 * @return void
	 */
	public function __destruct() { }
}
abstract class Controller
{
	/**
	 * @var Request
	 */
	protected $_request;
	/**
	 * @var Response
	 */
	protected $_response;
	/**
	 * @var View
	 */
	protected $_view;
	/**
	 * @return void
	 */
	private function __construct() { }
	/**
	 * @return void
	 */
	protected function _init() { }
	/**
	 * @return Request
	 */
	protected function getRequest() { }
	/**
	 * @return Response
	 */
	protected function getResponse() { }
	/**
	 * @return View
	 */
	protected function getView() { }
}
class Dispatcher
{
	/**
	 * @var self
	 */
	protected static $_instance;
	/**
	 * @var Router
	 */
	private $_router;
	/**
	 * @var Request
	 */
	private $_request;
	/**
	 * @return void
	 */
	private function __construct() { }
	/**
	 * @return Router
	 */
	public function findRouter() { }
	/**
	 * @return Request
	 */
	public function getRequest() { }
}
class Request
{
	/**
	 * @var self
	 */
	protected static $_instance;
	/**
	 * @var string
	 */
	protected $_method;
	/**
	 * @var string
	 */
	protected $_uri;
	/**
	 * @var array
	 */
	protected $_cookie;
	/**
	 * @var array
	 */
	protected $_query;
	/**
	 * @var array
	 */
	protected $_param;
	/**
	 * @var array
	 */
	protected $_post;
	/**
	 * @var array
	 */
	protected $_files;
	/**
	 * @return void
	 */
	public function __construct() { }
	/**
	 * @return string
	 */
	public function getMethod() { }
	/**
	 * @return string
	 */
	public function getUri() { }
	/**
	 * @param string $key
	 * @param mixed $default_value
	 * @param callable $filter
	 * @return array
	 */
	public function getQuery($key, $default_value, callable $filter) { }
	/**
	 * @param string $key
	 * @param mixed $default_value
	 * @param callable $filter
	 * @return array
	 */
	public function getPost($key, $default_value, callable $filter) { }
	/**
	 * @param string $key
	 * @param mixed $default_value
	 * @param callable $filter
	 * @return array
	 */
	public function getParam($key, $default_value, callable $filter) { }
	/**
	 * @param string $key
	 */
	public function getFile($key) { }
	/**
	 * @param string $key
	 * @return array
	 */
	public function getCookie($key) { }
	/**
	 * @return boolean
	 */
	public function isAjax() { }
	/**
	 * @return boolean
	 */
	public function isPost() { }
	/**
	 * @return boolean
	 */
	public function isGet() { }
	/**
	 * @return boolean
	 */
	public function isCli() { }
	/**
	 * @param string $method
	 * @return $this
	 */
	public function setMethod($method) { }
	/**
	 * @param string $uri
	 * @return $this
	 */
	public function setUri($uri) { }
	/**
	 * @param array $param
	 * @return $this
	 */
	public function setParam($param) { }
	/**
	 * @param array $post
	 * @return $this
	 */
	public function setPost($post) { }
	/**
	 * @param array $query
	 * @return $this
	 */
	public function setQuery($query) { }
}
class Response
{
	/**
	 * @var self
	 */
	protected static $_instance;
	/**
	 * @var array
	 */
	protected $_header;
	/**
	 * @var int
	 */
	protected $_status;
	/**
	 * @var string
	 */
	protected $_body;
	/**
	 * @return void
	 */
	private function __construct() { }
	/**
	 * @param int $status
	 * @return $this
	 */
	public function status($status) { }
	/**
	 * @param string $key
	 * @param string $val
	 * @return $this
	 */
	public function header($key, $val) { }
	/**
	 * @param string $body
	 * @return $this
	 */
	public function body($body) { }
	/**
	 * @return void
	 */
	public function send() { }
	/**
	 * @return $this
	 */
	public function json($obj) { }
	/**
	 * @return void
	 */
	public function redirect($url) { }
}
class Router
{
	/**
	 * @var self
	 */
	private static $_instance;
	/**
	 * @var RouterRule[]
	 */
	private $_rules;
	private $_chunk_size;
	/**
	 * @return void
	 */
	public function __construct() { }
	/**
	 * @return void
	 */
	public function add($rule_item) { }
	/**
	 * @param string $uri
	 * @param string $class
	 * @param string $method
	 */
	public function get($uri, $class, $method) { }
	/**
	 * @param string $uri
	 * @param string $class
	 * @param string $method
	 * @return void
	 */
	public function put($uri, $class, $method) { }
	/**
	 * @param string $uri
	 * @param string $class
	 * @param string $method
	 * @return void
	 */
	public function post($uri, $class, $method) { }
	/**
	 * @param string $uri
	 * @param string $class
	 * @param string $method
	 * @return void
	 */
	public function delete($uri, $class, $method) { }
	/**
	 * @return $this
	 */
	public function setChunkSize($chunkSize) { }
	/**
	 * @return RouterRule[]
	 */
	public function getRules() { }
	/**
	 * @return void
	 */
	public function dump() { }
}
final class RouterRule
{
	/**
	 * @var string
	 */
	private $_request_method;
	/**
	 * @var string
	 */
	private $_uri;
	/**
	 * @var array
	 */
	private $_params_map;
	/**
	 * @var string
	 */
	private $_class;
	/**
	 * @var string
	 */
	private $_class_method;
	/**
	 * @param string $request_method
	 * @param string $uri
	 * @param string $class
	 * @param string $class_method
	 * @return void
	 */
	public function __construct($request_method, $uri, $class, $class_method) { }
	/**
	 * @return string
	 */
	public function getRequestMethod() { }
	/**
	 * @return string
	 */
	public function getUri() { }
	/**
	 * @return string
	 */
	public function getClass() { }
	/**
	 * @return string
	 */
	public function getClassMethod() { }
	/**
	 * @return void
	 */
	public function dump() { }
}
class View
{
	/**
	 * @var array
	 */
	protected $_vars;
	/**
	 * @var string
	 */
	protected $_tpl_dir;
	/**
	 * @return void
	 */
	public function __construct() { }
	/**
	 * @return $this
	 */
	public function setScriptPath($tpl) { }
	/**
	 * @return string
	 */
	public function getScriptPath() { }
	/**
	 * @return void
	 */
	public function display($tpl) { }
	/**
	 * @return void
	 */
	public function render($tpl) { }
	/**
	 * @return array
	 */
	public function getVars() { }
	/**
	 * @param string $key
	 * @param string $val
	 * @return $this
	 */
	public function assign($key, $val) { }
}
