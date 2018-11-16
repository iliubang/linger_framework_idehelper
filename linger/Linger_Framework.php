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
	 * @return $this
	 */
	public static function app() { }
	/**
	 * @param Bootstrap $bootclasses
	 * @return void
	 */
	public function init(Bootstrap $bootclasses) { }
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
	public function bootstrap(Application $app);
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
	public function __construct(Config $config) { }
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
	 * @return $this
	 */
	public function get(string $key) { }
	/**
	 * @param string $key
	 * @param mixed $val
	 * @return void
	 */
	public function set(string $key, $val) { }
	/**
	 * @param string $key
	 * @return void
	 */
	public function has(string $key) { }
	/**
	 * @param string $key
	 * @return void
	 */
	public function del(string $key) { }
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
	public function offsetGet(string $key) { }
	/**
	 * @param string $key
	 * @param mixed $val
	 * @return void
	 */
	public function offsetSet(string $key, $val) { }
	/**
	 * @param string $key
	 * @return void
	 */
	public function offsetExists(string $key) { }
	/**
	 * @param string $key
	 * @return void
	 */
	public function offsetUnset(string $key) { }
	/**
	 * @param string $key
	 * @return void
	 */
	public function __get(string $key) { }
	/**
	 * @param string $key
	 * @param mixed $val
	 * @return void
	 */
	public function __set(string $key, $val) { }
	/**
	 * @param string $key
	 * @return void
	 */
	public function __isset(string $key) { }
	/**
	 * @param string $key
	 * @return void
	 */
	public function __unset(string $key) { }
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
	public function getQuery(string $key, $default_value, callable $filter) { }
	/**
	 * @param string $key
	 * @param mixed $default_value
	 * @param callable $filter
	 * @return array
	 */
	public function getPost(string $key, $default_value, callable $filter) { }
	/**
	 * @param string $key
	 * @param mixed $default_value
	 * @param callable $filter
	 * @return array
	 */
	public function getParam(string $key, $default_value, callable $filter) { }
	/**
	 * @param string $key
	 * @return array
	 */
	public function getFile(string $key) { }
	/**
	 * @param string $key
	 * @return array
	 */
	public function getCookie(string $key) { }
	/**
	 * @return bool
	 */
	public function isAjax() { }
	/**
	 * @return bool
	 */
	public function isPost() { }
	/**
	 * @return bool
	 */
	public function isGet() { }
	/**
	 * @return bool
	 */
	public function isCli() { }
	/**
	 * @param string $method
	 * @return $this
	 */
	public function setMethod(string $method) { }
	/**
	 * @param string $uri
	 * @return $this
	 */
	public function setUri(string $uri) { }
	/**
	 * @param array $param
	 * @return $this
	 */
	public function setParam(array $param) { }
	/**
	 * @param array $post
	 * @return $this
	 */
	public function setPost(array $post) { }
	/**
	 * @param array $query
	 * @return $this
	 */
	public function setQuery(array $query) { }
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
	public function status(int $status) { }
	/**
	 * @param string $key
	 * @param mixed $val
	 * @return $this
	 */
	public function header(string $key, $val) { }
	/**
	 * @param string $body
	 * @return $this
	 */
	public function body(string $body) { }
	/**
	 * @return void
	 */
	public function send() { }
	/**
	 * @param array $obj
	 * @return $this
	 */
	public function json(array $obj) { }
	/**
	 * @param string $url
	 * @return void
	 */
	public function redirect(string $url) { }
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
	 * @return $this
	 */
	public function get(string $uri, string $class, string $method) { }
	/**
	 * @param string $uri
	 * @param string $class
	 * @param string $method
	 * @return $this
	 */
	public function put(string $uri, string $class, string $method) { }
	/**
	 * @param string $uri
	 * @param string $class
	 * @param string $method
	 * @return $this
	 */
	public function post(string $uri, string $class, string $method) { }
	/**
	 * @param string $uri
	 * @param string $class
	 * @param string $method
	 * @return $this
	 */
	public function delete(string $uri, string $class, string $method) { }
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
	public function __construct(string $request_method, string $uri, string $class, string $class_method) { }
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
	 * @param mixed $val
	 * @return $this
	 */
	public function assign(string $key, $val) { }
}
