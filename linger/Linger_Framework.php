<?php
declare(strict_types=1);

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
     * @param $className
     */
    public static function autoload($className)
    {
    }

    /**
     * Application constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
    }

    /**
     * @return Application
     */
    public static function app()
    {
    }

    /**
     * @param array $bootclass
     * @return self
     */
    public function init(array $bootclass)
    {
    }

    /**
     * @return void
     */
    public function run()
    {
    }

    /**
     * @return Config
     */
    public function getConfig()
    {
    }

    /**
     * @return Router
     */
    public function getRouter()
    {
    }

    /**
     * @return Dispatcher
     */
    public function getDispatcher()
    {
    }
}

interface Bootstrap
{
    public function bootstrap(Application $application);
}

final class Config implements \Iterator, \ArrayAccess, \Countable
{
    protected static $_instance;
    protected $_config;

    public function __construct()
    {
    }

    private function __clone()
    {
    }

    private function __sleep()
    {
    }

    private function __wakeup()
    {
    }

    public function get()
    {
    }

    public function set()
    {
    }

    public function has()
    {
    }

    public function del()
    {
    }

    public function count()
    {
    }

    public function rewind()
    {
    }

    public function next()
    {
    }

    public function current()
    {
    }

    public function key()
    {
    }

    public function valid()
    {
    }

    public function clear()
    {
    }

    public function offsetGet($offset)
    {
    }

    public function offsetSet($offset, $value)
    {
    }

    public function offsetExists($offset)
    {
    }

    public function offsetUnset($offset)
    {
    }

    public function __get()
    {
    }

    public function __set()
    {
    }

    public function __isset()
    {
    }

    public function __unset()
    {
    }

    public function __destruct()
    {
    }
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
     * Controller constructor.
     */
    private function __construct()
    {
    }

    /**
     * @return void
     */
    protected function _init()
    {
    }

    /**
     * @return Request
     */
    protected function getRequest()
    {
    }

    /**
     * @return Response
     */
    protected function getResponse()
    {
    }

    /**
     * @return View
     */
    protected function getView()
    {
    }
}

class Dispatcher
{
    /**
     * @var Dispatcher
     */
    protected static $_instance;

    /**
     * @var Router[]
     */
    private $_router;

    /**
     * @var Request
     */
    private $_request;

    /**
     * Dispatcher constructor.
     */
    private function __construct()
    {
    }

    /**
     * @return Router
     */
    public function findRouter()
    {
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
    }
}

class Request
{
    /**
     * @var Request
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
     * Request constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return string
     */
    public function getMethod()
    {
    }

    /**
     * @return string
     */
    public function getUri()
    {
    }

    /**
     * @param string $key
     * @param null $default
     * @param callable|null $filter
     * @return mixed
     */
    public function getQuery(string $key = null, $default = null, callable $filter = null)
    {
    }

    /**
     * @param string $key
     * @param null $default
     * @param callable|null $filter
     * @return mixed
     */
    public function getPost(string $key = null, $default = null, callable $filter = null)
    {
    }

    /**
     * @param string $key
     * @param null $default
     * @param callable|null $filter
     * @return mixed
     */
    public function getParam(string $key = null, $default = null, callable $filter = null)
    {
    }

    /**
     * @param string|null $key
     * @return mixed
     */
    public function getFile(string $key = null)
    {
    }

    /**
     * @param string|null $key
     * @return mixed
     */
    public function getCookie(string $key = null)
    {
    }

    /**
     * @return bool
     */
    public function isAjax()
    {
    }

    /**
     * @return bool
     */
    public function isPost()
    {
    }

    /**
     * @return bool
     */
    public function isGet()
    {
    }

    /**
     * @return bool
     */
    public function isCli()
    {
    }

    /**
     * @param string $method
     * @return self
     */
    public function setMethod(string $method)
    {
    }

    /**
     * @param string $uri
     * @return self
     */
    public function setUri(string $uri)
    {
    }

    /**
     * @param array $param
     * @return self
     */
    public function setParam(array $param)
    {
    }

    /**
     * @param array $post
     * @return self
     */
    public function setPost(array $post)
    {
    }

    /**
     * @param array $query
     * @return self
     */
    public function setQuery(array $query)
    {
    }
}

class Response
{
    /**
     * @var Response
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
     * Response constructor.
     */
    private function __construct()
    {
    }

    /**
     * @param int $status
     * @return self
     */
    public function status(int $status)
    {
    }

    /**
     * @param string $key
     * @param string $val
     * @return self
     */
    public function header(string $key, string $val)
    {
    }

    /**
     * @param string $body
     * @return self
     */
    public function body(string $body)
    {
    }

    public function send()
    {
    }

    /**
     * @param null $obj
     * @return self
     */
    public function json($obj = null)
    {
    }
}

class Router
{
    /**
     * @var Router
     */
    private static $_instance;

    /**
     * @var array
     */
    private $_rules;

    /**
     * @var int
     */
    private $_chunk_size;

    /**
     * Router constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param RouterRule $rule
     * @reutrn self
     */
    public function add(RouterRule $rule)
    {
    }

    /**
     * @param string $uri
     * @param string $class
     * @param string $classMethod
     * @return self
     */
    public function get(string $uri, string $class, string $classMethod)
    {
    }

    /**
     * @param string $uri
     * @param string $class
     * @param string $classMethod
     * @return self
     */
    public function put(string $uri, string $class, string $classMethod)
    {
    }

    /**
     * @param string $uri
     * @param string $class
     * @param string $classMethod
     * @return self
     */
    public function post(string $uri, string $class, string $classMethod)
    {
    }

    /**
     * @param string $uri
     * @param string $class
     * @param string $classMethod
     * @return self
     */
    public function delete(string $uri, string $class, string $classMethod)
    {
    }

    /**
     * @param int $chunkSize
     * @return self
     */
    public function setChunkSize(int $chunkSize)
    {
    }

    /**
     * @return array
     */
    public function getRules()
    {
    }

    /**
     * @return void
     */
    public function dump()
    {
    }
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
     * RouterRule constructor.
     * @param string $method
     * @param string $uri
     * @param string $class
     * @param string $classMethod
     */
    public function __construct(string $method, string $uri, string $class, string $classMethod)
    {
    }

    /**
     * @return string
     */
    public function getRequestMethod()
    {
    }

    /**
     * @return string
     */
    public function getUri()
    {
    }

    /**
     * @return string
     */
    public function getClass()
    {
    }

    /**
     * @return string
     */
    public function getClassMethod()
    {
    }

    /**
     * @return void
     */
    public function dump()
    {
    }
}

class View
{
    protected $_vars;
    protected $_tpl_dir;

    /**
     * View constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param string $path
     * @return self
     */
    public function setScriptPath(string $path)
    {
    }

    /**
     * @return string
     */
    public function getScriptPath()
    {
    }

    /**
     * @param string $tpl
     * @return bool
     */
    public function display(string $tpl)
    {
    }

    /**
     * @param string $tpl
     * @return string
     */
    public function render(string $tpl)
    {
    }

    /**
     * @return array
     */
    public function getVars()
    {
    }

    /**
     * @param string $key
     * @param $val
     * @return self
     */
    public function assign(string $key, $val)
    {
    }
}
