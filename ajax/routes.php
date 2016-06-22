<?php
include '.config';

$autoload_dirs = array( '../util',
                        '../view',
                        '../dao',
                        '../dao/generated',
                        '../dao/querier',
                        '../dao/object',
                        'controller',
                        'controller/account',
                        'controller/generic',
                        'controller/good',
                        'controller/trip',
                        'controller/message',
                        'validator',
                        'validator/account',
                        'validator/message'
                      );

// blockIp();
$services = array('GET'=>array(), 'POST'=>array(), 'PUT'=>array(), 'DELETE'=>array());
include 'mapper.php';

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$uri = parseGetparams($uri);
$uri = substr($uri, 5); // remove "/ajax" from the uri.

// find the handler based on request uri from $services configured in mapping.php
//
$uris = explode('/', $uri);
foreach ($services[$method] as $key=>$val) {
    $keys = explode('/', $key);
    if (sizeof($uris)==sizeof($keys)) {
        $match = TRUE;
        $params = array();
        foreach ($uris as $ind=>$elem) {
            if ($uris[$ind]!=$keys[$ind]) {
                if (strpos($keys[$ind],':') !== false) {
                    $index = substr($keys[$ind], 1);
                    $params[$index] = $uris[$ind];
                } else {
                    $match = FALSE;
                }
            }
        }

        if ($match) {
            $controller = $services[$method][$key][0];
            $validator = $services[$method][$key][1];

            ASession::init();
            if (isset($validator)) {
                if ($validator->validate($params)) {
                    $controller->execute($params);
                } else {
                    $validator->errorOut();
                }
            } else {
                $controller->execute($params);
            }
            exit;
        }
    }
}

// cannot find handler for the request uri, return 501
//
header('HTTP/1.0 404 Not Found');
echo '{"status":"error", "description":"not_found"}';


//=================================================================================================


/**
 * Function check if the request ip is on the black list, if it is then block the request. 
 */
function blockIp() {
    global $ip_block_list;

    $ip = Utility::getClientIp();

    if (isset($ip_block_list[$ip]) && $ip_block_list[$ip]==1) {
        header('HTTP/1.0 403 Forbidden');
        echo '{"error":"403 Forbidden"}';
        exit;
    }
}


/**
 * Function registers a request handler to a method and a uri path used in config/mapping.php
 * 
 * @param string $method
 * @param string $path
 * @param AuthorizedRequestHandler $handler
 */
function register($method, $path, $handler, $validator=null) {
    global $services;
    $services[$method][$path] = array($handler, $validator);
}


/**
 * autoload required class from registered autoload directories in config.inc
 * 
 * @param string $class_name
 */
function __autoload($class_name) {
    global $autoload_dirs;

    // loop through all configured included folders for the {$class_name}.php file.
    //
    foreach ($autoload_dirs as $dir) {
        if (is_file($dir.'/'.$class_name.'.php')) {
            include ($dir.'/'.$class_name.'.php');
            return;
        }
    }
}


/**
 * Parse out GET parameters in a given $uri and put them in $_GET variable.
 * 
 * @param string $uri - input uri
 * @return the same uri with GET parameters removed
 */
function parseGetparams($uri) {
    $gets = explode('?', $uri);
    if (sizeof($gets)>2) {
        header('HTTP/1.0 400 Bad Request');
        echo '{"error":"400 Bad Request"}';
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
        exit;
    } elseif (sizeof($gets)==2) {
        $getParams = explode('&', $gets[1]);
        foreach ($getParams as $getParam) {
            $pair = explode('=', $getParam);
            if (sizeof($pair)==2) {
                $_GET[$pair[0]] = $pair[1];
            }
        }
    }

    return $gets[0];
}
?>