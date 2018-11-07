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
	public static function autoload() { }
	public function __construct(array $aconfig) { }
	public static function app() { }
	public function init($bootclasses) { }
	public function run() { }
	public function getConfig() { }
	public function getRouter() { }
	public function getDispatcher() { }
}
interface Bootstrap
{
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
	public function __construct($config) { }
	private function __clone() { }
	private function __sleep() { }
	private function __wakeup() { }
	public function get($key) { }
	public function set($key, $val) { }
	public function has($key) { }
	public function del($key) { }
	public function count() { }
	public function rewind() { }
	public function next() { }
	public function current() { }
	public function key() { }
	public function valid() { }
	public function clear() { }
	public function offsetGet($key) { }
	public function offsetSet($key, $val) { }
	public function offsetExists($key) { }
	public function offsetUnset($key) { }
	public function __get($key) { }
	public function __set($key, $val) { }
	public function __isset($key) { }
	public function __unset($key) { }
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
	private function __construct() { }
	protected function _init() { }
	protected function getRequest() { }
	protected function getResponse() { }
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
	private function __construct() { }
	public function findRouter() { }
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
	public function __construct() { }
	public function getMethod() { }
	public function getUri() { }
	public function getQuery($key, $default_value, callable $filter) { }
	public function getPost($key, $default_value, callable $filter) { }
	public function getParam($key, $default_value, callable $filter) { }
	public function getFile($key) { }
	public function getCookie($key) { }
	public function isAjax() { }
	public function isPost() { }
	public function isGet() { }
	public function isCli() { }
	public function setMethod($method) { }
	public function setUri($uri) { }
	public function setParam($param) { }
	public function setPost($post) { }
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
	private function __construct() { }
	public function status($status) { }
	public function header($key, $val) { }
	public function body($body) { }
	public function send() { }
	public function json($obj) { }
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
	public function __construct() { }
	public function add($rule_item) { }
	public function get($uri, $class, $method) { }
	public function put($uri, $class, $method) { }
	public function post($uri, $class, $method) { }
	public function delete($uri, $class, $method) { }
	public function setChunkSize($chunkSize) { }
	public function getRules() { }
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
	public function __construct($request_method, $uri, $class, $class_method) { }
	public function getRequestMethod() { }
	public function getUri() { }
	public function getClass() { }
	public function getClassMethod() { }
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
	public function __construct() { }
	public function setScriptPath($tpl) { }
	public function getScriptPath() { }
	public function display($tpl) { }
	public function render($tpl) { }
	public function getVars() { }
	public function assign($key, $val) { }
}
