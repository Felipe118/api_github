<?php

namespace MF\Init;

abstract class Bootstrap
{
    private $routes;

    abstract protected function initRoutes();

    public function __construct()
    {
        $this->initRoutes();
        $this->run($this->getUrl());
    }

    
    public function getRoutes(){
        return $this->routes;
    }

    public function setRoutes(array $routes){
        $this->routes = $routes;
    }

    public function run($url){

        foreach($this->getRoutes() as $key => $route){
             $rota = explode('/',$route['route']);
            // print_r($rota[1]);
            // die;
            if('/'.$url[1] == '/'.$rota[1]){
                $class = "Src\\Controller\\".ucfirst($route['controller']);
                
                $controller = new $class;
    
                $action = $route['action'];
    
                $controller->$action();
            }

        }
    }

    protected function getUrl(){
        
        $route = explode('/',parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) );
        return $route;
    }

}