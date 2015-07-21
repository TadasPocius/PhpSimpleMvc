<?php

class Landing extends Controller
{
    private $config;

    public function __construct($config) {
        $this->config = $config;
    }
    
    /* Example with a data array */
    public function Index()
    {
        $this->view('landing/index', array('config' => $this->config));
    }
}

