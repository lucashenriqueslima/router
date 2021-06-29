<?php

    namespace Source;

    class Router
    {   

        private array $handlers;
        private $notFound;
        private $className = "Source\Controllers\\";
        private const METHOD_POST = 'POST';
        private const METHOD_GET = 'GET';

        public function get(string $path, $handler): void
        {   
            $path = "/matics2".$path;
            $this->addHandler(self::METHOD_GET, $path, $handler);
        }

        public function post(string $path, $handler): void
        {
            $path = "/matics2".$path;
            $this->addHandler(self::METHOD_POST, $path, $handler);
        }

        private function addHandler(string $method, string $path, $handler): void
        {
            $this->handlers[$method . $path] = [
                'path' => $path,
                'method' => $method,
                'handler' => $handler
            ];

        }

        public function notFound($handler)
        {
            $this->notFound = $handler; 
        }

        public function run()
        {   

            $requestUri = parse_url($_SERVER["REQUEST_URI"]);
            $requestPath =  $requestUri['path'];
            
            $method = $_SERVER['REQUEST_METHOD'];

            $callback = null;

            foreach($this->handlers as $handler)
            {
                if($handler['path'] === $requestPath && $method === $handler['method']){
                    $callback = $handler['handler'];
                }
            }

            if(is_string($callback)){

                $parts = explode(':', $callback);
                if(is_array($parts)){
                    $this->className .= current($parts);
                    $handler = new $this->className;
                    $method = array_shift($parts);
                    $callback = [$handler, $method];
                }
            }

            if(!$callback){
                header("HTTP/1.0 404 Not Found");
                if(!empty($this->notFound)){
                    $callback = $this->notFound;
                }
            }

           
            
            call_user_func_array($callback, [
                array_merge($_GET, $_POST)
            ]);
        }

    }