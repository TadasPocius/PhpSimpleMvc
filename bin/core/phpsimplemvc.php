<?php

class PhpSimpleMvc
{
    // Default controller
    protected $controller = 'landing';
    
    // Default method
    protected $method = 'index';
    
    protected $params = array();

    public function __construct($config)
    {
        $url = $this->parseUrl();
        
        if(file_exists('bin/controllers/' . $url[0] . '.php'))
        {
            $this->controller = $url[0];
            unset($url[0]);
        }
            
        require_once 'bin/controllers/' . $this->controller . '.php';

        /* Injecting Config as a dependency to controller */
        $this->controller = new $this->controller($config);

        if(isset($url[1]))
        {
            if(method_exists($this->controller, $url[1])){

                $this->method = $url[1];
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : array();
        unset($url);

        call_user_func_array(array($this->controller, $this->method), $this->params);
    }
    
    public function parseUrl()
    {
        if(isset($_GET['url']))
        {
            return $url = explode('/',filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}
