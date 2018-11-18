<?php

error_reporting(0);

function from_camel_case($str)
{
    $str[0] = strtolower($str[0]);
    $func = function ($c) {
        return "_" . strtolower($c[1]);
    };
    return preg_replace_callback('/([A-Z])/', $func, $str);
}

echo "<?php\n";

$classes = [
    'Application',
    'Bootstrap',
    'Config',
    'Controller',
    'Dispatcher',
    'Request',
    'Response',
    'Router',
    'RouterRule',
    'View',
];

$types = [
    'app'            => 'Application',
    'config'         => 'Config',
    'router'         => 'Router',
    'dispatcher'     => 'Dispatcher',
    'instance'       => 'self',
    'request'        => 'Request',
    'response'       => 'Response',
    'rule'           => 'RouterRule',
    'view'           => 'View',
    'bootclasses'    => 'Bootstrap[]',
    'method'         => 'string',
    'uri'            => 'string',
    'header'         => 'array',
    'query'          => 'array',
    'param'          => 'array',
    'post'           => 'array',
    'files'          => 'array',
    'file'           => 'array',
    'cookie'         => 'array',
    'status'         => 'int',
    'body'           => 'string',
    'rules'          => 'RouterRule[]',
    'request_method' => 'string',
    'params_map'     => 'array',
    'class'          => 'string',
    'class_method'   => 'string',
    'vars'           => 'array',
    'tpl_dir'        => 'string',
    'key'            => 'string',
    'val'            => 'mixed',
    'filter'         => 'callable',
    'default_value'  => 'mixed',
    'script_path'    => 'string',
    'obj'            => 'array',
    'url'            => 'string'
];

$protocolSupportedType = [
    'string',
    'int',
    'bool',
    'callable',
    'array'
];

$protocolSupportedType = array_merge($protocolSupportedType, $classes);

$methods = [
    'status' => '\$this',
    'header' => '\$this',
    'body'   => '\$this',
    'json'   => '\$this',
    'assign' => '\$this',
    'app'    => 'Application',
    'get'    => '\$this',
    'put'    => '\$this',
    'delete' => '\$this',
    'post'   => '\$this',
    'init'   => 'Application'
];

echo <<<PHP
namespace linger\\framework;

PHP;

foreach ($classes as $name) {
    try {
        $c = "linger\\framework\\" . $name;
        $clazz = new ReflectionClass($c);
        $m = implode(" ", Reflection::getModifierNames($clazz->getModifiers()));
        if (!empty($m)) {
            echo $m . " ";
        }
        if ($clazz->isTrait()) {
            echo "trait ";
        } elseif ($clazz->isInterface()) {
            echo "interface ";
        } else {
            echo "class ";
        }
        echo $name;

        $inters = $clazz->getInterfaces();
        if (!empty($inters)) {
            $str = " implements ";
            foreach ($inters as $inter) {
                if ($inter->getName() == "Traversable") {
                    continue;
                }
                $str .= '\\' . $inter->getNamespaceName() . $inter->getName() . ",";
            }
            echo rtrim($str, ',');
        }

        echo "\n";
        echo "{\n";

        foreach ($clazz->getConstants() as $constant => $value) {
            echo "\tconst " . $constant . " = " . $value . ";\n";
        }
        foreach ($clazz->getProperties() as $property) {
            $name = $property->getName();
            if (substr($name, 0, 1) == '_') {
                $name = substr($name, 1);
            }
            if (isset($types[$name])) {
                echo "\t/**\n";
                echo "\t * @var {$types[$name]}\n";
                echo "\t */\n";
            }
            echo "\t" . implode(" ",
                    Reflection::getModifierNames($property->getModifiers())) . " $" . $property->getName();
            $property->setAccessible(true);
            if (!is_null($property->getValue())) {
                echo " = " . $property->getValue() . ";\n";
            } else {
                echo ";\n";
            }
        }
        //ReflectionClass::export($c);
        foreach ($clazz->getMethods() as $method) {
            $params = $method->getParameters();
            echo "\t/**\n";

            foreach ($params as $param) {
                $n = from_camel_case($param->getName());
                if (isset($types[$n])) {
                    echo "\t * @param {$types[$n]} \${$param->getName()}\n";
                }
            }

            $name = $method->getName();
            if (substr($name, 0, 3) == 'get' && strlen($name) > 3) {
                $name = substr($name, 3);
                $name = from_camel_case($name);
                if (isset($types[$name])) {
                    echo "\t * @return {$types[$name]}\n";
                }
            } elseif (substr($name, 0, 4) == 'find' && strlen($name) > 4) {
                $name = substr($name, 4);
                $name = from_camel_case($name);
                if (isset($types[$name])) {
                    echo "\t * @return {$types[$name]}\n";
                }
            } elseif (substr($name, 0, 3) == 'set' && strlen($name) > 3) {
                echo "\t * @return \$this\n";
            } elseif (substr($name, 0, 2) == 'is' && strlen($name) > 2) {
                echo "\t * @return bool\n";
            } elseif (isset($methods[$name])) {
                echo "\t * @return \$this\n";
            } else {
                echo "\t * @return void\n";
            }

            echo "\t */\n";
            $modi = implode(" ", Reflection::getModifierNames($method->getModifiers()));
            echo "\t";
            if ($clazz->isInterface()) {
                echo str_replace("abstract ", "", $modi);
            } else {
                echo $modi;
            }

            echo ' function ' . $method->getName();
            $paramsStr = '';
            foreach ($params as $paramObj) {
                if ($paramObj->isCallable()) {
                    $paramsStr .= 'callable ';
                } elseif ($paramObj->isArray()) {
                    $paramsStr .= 'array ';
                } else {
                    $n = from_camel_case($paramObj->getName());
                    if (isset($types[$n]) && in_array($types[$n], $protocolSupportedType)) {
                        $paramsStr .= $types[$n] . ' ';
                    }
                }

                if (!$paramObj->canBePassedByValue()) {
                    $paramsStr .= '&';
                }

                $paramsStr .= '$' . $paramObj->getName();
                try {
                    $default = $paramObj->getDefaultValue();
                    $paramsStr .= ' = ' . $default;
                } catch (ReflectionException $e) {
                    ;;
                }
                $paramsStr .= ', ';
            }

            $paramsStr = rtrim($paramsStr, ', ');
            if ($clazz->isInterface()) {
                echo '(' . $paramsStr . ');' . PHP_EOL;
            } else {
                echo '(' . $paramsStr . ') { }' . PHP_EOL;
            }
        }

        echo "}\n";
    } catch (ReflectionException $e) {
        //        echo $e->getMessage();
    }
}
