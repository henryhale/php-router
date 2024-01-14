<?php

/**
 * PHP Router
 */
class Router
{
    /**
     * An array to hold all registered routes
     */
    private array $routes;

    /**
     * A route to navigate to incase the requested route is not found
     */
    private string $fallbackRoute;

    /**
     * Initiate the router with default base path and fallback route 
     */
    function __construct() {
        $this->routes = [];
    }

    /**
     * Destroy the instance's data
     */
    function __destruct() {
        unset($this->routes);
        unset($this->fallbackRoute);
    }
  
    /**
     * Append a new route to the routes list (register a new route)
     */
    private function addRoute(string $method, string $pattern, $callback): void
    {
        if (!is_callable($callback)) {
            throw new Exception("Invalid route callback for: '". $pattern ."' - It must be a function.", 1);
        }

        $this->routes[] = [
            'method' => $method,
            'pattern' => $pattern,
            'callback' => $callback,
        ];
    }

    /**
     * In case the requested route is not found, the router attempts to navigate to a fallback route: /404 
     * 
     * This function sets the default route
     */
    public function fallback(string $route): void
    {
        $this->fallbackRoute = $route;
    }

    /**
     * Request Method: GET
     * - Set a route actionable on a GET request
     */
    public function get(string $pattern, $callback): void
    {
        $this->addRoute('GET', $pattern, $callback);
    }

    /**
     * Request Method: POST
     * - Set a route actionable on a POST request
     */
    public function post(string $pattern, $callback): void
    {
        $this->addRoute('POST', $pattern, $callback);
    }

    /**
     * Request Method: GET & POST
     * - Set a route actionable on both GET and POST requests
     */
    public function form(string $pattern, $callback): void 
    {
        $this->get($pattern, $callback);
        $this->post($pattern, $callback);
    }

    /**
     * Request Method: DELETE
     * - Set a route actionable on a DELETE request
     */
    public function delete(string $pattern, $callback): void
    {
        $this->addRoute('DELETE', $pattern, $callback);
    }

    /**
     * Request Method: PATCH
     * - Set a route actionable on a PATCH request
     */
    public function patch(string $pattern, $callback): void
    {
        $this->addRoute('PATCH', $pattern, $callback);
    }

    /**
     * Request Method: PUT
     * - Set a route actionable on a PUT request
     */
    public function put(string $pattern, $callback): void
    {
        $this->addRoute('PUT', $pattern, $callback);
    }

    /**
     * Redirect a request to another route
     */
    public function redirect(string $route): void {
        header(str_replace('//', '/', 'Location: ' . $route));
        exit(0);
    }

    /**
     * Handle the incoming request using the request method and uri.
     * 
     * Redirect to the fallback route if the requested route is not found
     */
    public function handleRequest(): void
    {   
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        $uri = explode('?', $uri)[0];

        foreach ($this->routes as $route) {
            if ($route['method'] !== $method) continue;

            $routePattern = str_replace('/', '\/', $route['pattern']);
            $routePattern = '/^' . preg_replace('/(:\w+)/', '(\w+)', $routePattern) . '$/';

            if (preg_match($routePattern, $uri, $matches)) {
                // Remove the full match from $matches
                array_shift($matches);

                // Create an associative array with parameter names as keys
                $params = array_reduce(
                    explode('/', trim($route['pattern'], '/')),
                    function ($acc, $part) use (&$matches) {
                        if (strpos($part, ':') === 0) {
                            $paramName = ltrim($part, ':');
                            $acc[$paramName] = array_shift($matches);
                        }
                        return $acc;
                    },
                    []
                );
                
                // Call the closure associated with the route and pass the parameters
                $route['callback']($params);
                exit(0);
            }
        }

        // Route not found
        if (isset($this->fallbackRoute) && is_string($this->fallbackRoute)) {
            $this->redirect($this->fallbackRoute);
        }
        
        throw new Exception("Resource Not Found", 1);
    }
}
