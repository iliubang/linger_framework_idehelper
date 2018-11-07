<?php

error_reporting(0);

echo "<?php\n";

$carr = [
    'Application',
    'Bootstrap',
    'Config',
    'Controller',
    'Dispatcher',
    'Request',
    'Response',
    'Router',
    'RouterRule',
    'View'
];

$types = [
    '_app'            => 'Application',
    '_config'         => 'Config',
    '_router'         => 'Router',
    '_dispatcher'     => 'Dispatcher',
    '_instance'       => 'self',
    '_request'        => 'Request',
    '_response'       => 'Response',
    '_rule'           => 'RouterRule',
    '_view'           => 'View',
    '_method'         => 'string',
    '_uri'            => 'string',
    '_header'         => 'array',
    '_query'          => 'array',
    '_param'          => 'array',
    '_post'           => 'array',
    '_files'          => 'array',
    '_cookie'         => 'array',
    '_status'         => 'int',
    '_body'           => 'string',
    '_rules'          => 'RouterRule[]',
    '_request_method' => 'string',
    '_params_map'     => 'array',
    '_class'          => 'string',
    '_class_method'   => 'string',
    '_vars'           => 'array',
    '_tpl_dir'        => 'string'
];

echo <<<PHP
namespace linger\\framework;

PHP;

foreach ($carr as $name) {
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
            $modi = implode(" ", Reflection::getModifierNames($method->getModifiers()));
            echo "\t";
            if ($clazz->isInterface()) {
                echo str_replace("abstract ", "", $modi);
            } else {
                echo $modi;
            }
            echo ' function ' . $method->getName();
            $params = $method->getParameters();
            $paramsStr = '';
            foreach ($params as $paramObj) {
                if ($paramObj->isCallable()) {
                    $paramsStr .= 'callable ';
                } elseif ($paramObj->isArray()) {
                    $paramsStr .= 'array ';
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
