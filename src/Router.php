<?php 
declare(strict_types=1);

namespace App;

class Router
{
    /**
     * @var Controller
     */
    private $controller;

    public function __construct(Controller $controller)
    {
        $this->controller = $controller;
    }

    public function route(?string $path) {
        if ($path === null) {
            return $this->controller->index();
        }

        $slug = pathinfo($path, PATHINFO_BASENAME);
        return $this->controller->post($slug);
    }
}
