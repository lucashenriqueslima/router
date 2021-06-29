<?php 

    namespace Source\Controllers;

    abstract class Controller
    {   

        protected $header;
        protected $content;
        protected $footer;
        

        public function __construct()
        {


        }

        public function render($viewPath, $vars = [])
        {
            extract($vars);

            
            $this->content = VIEWPATH.$viewPath.".php";
           
                require_once($this->content); 

     

        }
}


    