<?php

    namespace Source;

    class Router
    {   

        private array $handlers;
        private const METHOD_POST = 'POST';
        private const METHOD_GET = 'GET';

        public function get(string $path, $handler): void
        {
            $this->addHandler(self::METHOD_GET, $path, $handler);
        }

        public function post(string $path, $handler): void
        {
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

        public function run()
        {   

            $requestUri = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"];
            var_dump(parse_url($requestUri));
            die;
            $requestPath = $requestUri['path'];
            $method = $_SERVER['REQUEST_METHOD'];

            $callback = null;

            foreach($this->handlers as $handler)
            {
                if($handler['path'] === $requestPath && $method === $handler['method']){
                    $callback = $handler['handler'];
                }
            }
            call_user_func_array($callback, [
                array_merge($_GET, $_POST)
            ]);
        }
    }