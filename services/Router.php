<?php

    class Router {
        private array $routes;
            public function __construct(){
            $this ->routes = [
                'GET' => [
                    '/noticias' =>[
                        'controller' => 'NoticiaController',
                        'function' => 'getNoticias'
                    ],
                    '/autores' => [
                        'controller' => 'AutorCOntroller',
                        'funtion' => 'getAutores'
                    ]
                ],
                'POST' => [
                    '/atualizar-noticia' =>[
                        'controller' =>'NoticiaController',
                        'function' => 'updateNoticia'
                    ]
                ],
                'PUT',
                'DELETE'=>[
                    '/excluir-noticia' => [
                        'controller' => 'NoticiaController',
                        'function'  =>'deleteNoticia'
                    ]
                ]

            ];
        }

        public function handleRequest(string $method,string $route): string {
            $routeExists = !empty($this->routes[$method][$route]);
            
            if(!$routeExists){
                return json_encode([
                    'erro' => 'Essa rota não existe!',
                    'result' => null
                ]);
            }
            
            $routeInfo = $this ->routes[$method][$route];
            
            $controller = $routeInfo['controller'];
            $function = $routeInfo['function'];

            require_once __DIR__ . '/../controllers/' . $controller. '.php';

            return (new $controller)->$function();

        }
    }

?>
