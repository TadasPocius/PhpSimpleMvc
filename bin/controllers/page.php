<?php
require_once 'bin/models/page/sample.php';

class Page extends Controller
{
    public function __construct() {
        
    }
    
    /* Example with an object */
    public function Sample($param1, $param2)
    {
        $obj = new Sample();
        $obj->param1 = $param1;
        $obj->param2 = $param2;
        
        $this->view('page/sample', $obj);
    }
}

