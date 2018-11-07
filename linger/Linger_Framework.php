<?php
namespace linger\framework;
final class Application
{
	protected static $_app;
	protected $_config;
	protected $_router;
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
	protected static $_instance;
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
	protected $_request;
	protected $_response;
	protected $_view;
	private function __construct() { }
	protected function _init() { }
	protected function getRequest() { }
	protected function getResponse() { }
	protected function getView() { }
}
class Dispatcher
{
	protected static $_instance;
	private $_router;
	private $_request;
	private function __construct() { }
	public function findRouter() { }
	public function getRequest() { }
}
class Request
{
	protected static $_instance;
	protected $_method;
	protected $_uri;
	protected $_cookie;
	protected $_query;
	protected $_param;
	protected $_post;
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
	protected static $_instance;
	protected $_header;
	protected $_status;
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
	private static $_instance;
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
	private $_request_method;
	private $_uri;
	private $_params_map;
	private $_class;
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
	protected $_vars;
	protected $_tpl_dir;
	public function __construct() { }
	public function setScriptPath($tpl) { }
	public function getScriptPath() { }
	public function display($tpl) { }
	public function render($tpl) { }
	public function getVars() { }
	public function assign($key, $val) { }
}
