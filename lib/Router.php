<?php
namespace IDCT\Framework\Chipmunk;

use IDCT\Framework\Chipmunk\Definitions\Interfaces\RouterInterface as RouterInterface;
use IDCT\Framework\Chipmunk\Definitions\Types\Route as Route;
/**
 * Router short summary.
 *
 * Router description.
 *
 * @version 1.0
 * @author Bartosz
 */
class Router extends Object implements RouterInterface
{
    public function getCurrentRoute() {
        return $this->generateRoute($_SERVER['REQUEST_URI'], $_SERVER['HTTP_MODE']);
    }

    public function generateRoute($url, $mode) {
        $raw = strtolower(explode('?',substr($url,1))[0]);
        $requestUri = explode('/',$raw);

        $route = new Route();

        $route->setMode($mode)
              ->setRaw($raw)
              ->setParts($requestUri);

        return $route;
    }
}
