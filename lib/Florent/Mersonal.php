<?php

namespace Florent;

/**
 * PHP 5.3+ Personal Micro Framework inspired by Synatra or Silex.
 *
 * @author Florent Desjardins <florent.desjardins@gmail.com>
 * @since 1.0.0
 */
class Mersonal
{
    
    /**
     * Any route
     *
     * @since 1.0.0
     * @param string pattern path
     * @param mixed any param callable by call_user_func_array
     * @return null
     */
    public function map($route, $callback) {

        $request =  '/' . ltrim(substr_replace($_SERVER['REQUEST_URI'], '', 0, strlen(dirname($_SERVER['SCRIPT_NAME']))), '/');
        
        if ($params = $this->match($route, $request)) {
            if (is_callable($callback)) {
                if ( ! is_array($params))
                    $callback();
                else
                    call_user_func_array($callback, $params);
                exit();
            }
        }
    }
    
    /**
     * GET method route
     *
     * @since 1.0.0
     * @param string pattern path
     * @param mixed any param callable by call_user_func_array
     * @return null
     */
    public function get($route, $callback) {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->map($route, $callback);
        }
    }
    
    /**
     * POST method route
     *
     * @since 1.0.0
     * @param string pattern path
     * @param mixed any param callable by call_user_func_array
     * @return null
     */
    public function post($route, $callback) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->map($route, $callback);
        }
    }

    /**
     * PUT method route
     *
     * @since 1.0.0
     * @param string pattern path
     * @param mixed any param callable by call_user_func_array
     * @return null
     */
    public function put($route, $callback) {
        if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
            $this->map($route, $callback);
        }
    }

    /**
     * DELETE method route
     *
     * @since 1.0.0
     * @param string pattern path
     * @param mixed any param callable by call_user_func_array
     * @return null
     */
    public function delete($route, $callback) {
        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            $this->map($route, $callback);
        }
    }
    
    /**
     * Match route
     *
     * @since 1.0.0
     * @return boolean|array
     */
    public function match($route, $request) {
        if ($route === $request) return true;
        
        $request_arr = explode('/', trim($request, '/'));
        $route_arr = explode('/', trim($route, '/'));
        
        if (count($request_arr) !== count($route_arr)) return false;
        
        $params = array();
        $count = count($route_arr);
        
        for($i = 0; $i < $count; $i++) {
            // not arrounded with '{}'
            if ( ! preg_match('/\{.*?\}/', $route_arr[$i])) {
                if ($route_arr[$i] != $request_arr[$i]) return false;
            } else {
                array_push($params, $request_arr[$i]);
            }
        }
        return $params;
    }
}