<?php

namespace App\Core\Kernel;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Kernel
{
    private $uri;
    private $request;
    private $routes = [
        '/' => __DIR__ . '/../../Views/homepage/index.html',
        '/seconde-page' => __DIR__ . '/../../Views/page2.html'
    ];

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->uri = $request->server->get('REQUEST_URI', '/');
    }

    public function run()
    {
        $route = $this->matchRoute();

        $response = new Response(
            file_get_contents($route),
            Response::HTTP_OK,
            ['content/type' => 'text/html']
        );

        $response->prepare($this->request);
        $response->send();
    }

    public function matchRoute()
    {
        foreach ($this->routes as $route => $htmlPageName) {
            if ($this->uri === $route) return $htmlPageName;
        }

        return $this->routes[0];
    }
}