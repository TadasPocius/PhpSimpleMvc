<?php

class Controller
{
    public function model($model)
    {
        require_once 'bin/models/' . $model . '.php';
        
        return new $model();
    }
    
    public function view($view, $data = array())
    {
        require_once 'bin/views/' . $view . '.php';
    }
}

?>
