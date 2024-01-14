<?php

/**
 * Define the routes for your application
 */
function defineRoutes(\Router $router) {

    /**
     * NOTE:
     *  In case you are using a virtual host, 
     *  replace `http://localhost` with your virtual host name
     *  in the following examples
     */


    /**
     * Static GET
     * - navigate to http://localhost
     */
    $router->get('/', view('home.php', 'Home'));

    /**
     * Static GET - Example page under route
     * - navigate to http://localhost/page
     */
    $router->get('/page', view('page.php', 'Page'));

    /**
     * Dynamic GET - Example with one variable
     * The $params['id'] will be set and available in `user.php`
     * - navigate to http://localhost/user/354
     */
    $router->get('/user/:id', view('user.php', 'Profile'));

    /**
     * Dynamic GET - Example with two variables
     * Both 'id' and 'author' are keys in the $params array.
     * $params['id'] and $params['author'] will be set and available in `post.php`
     * - navigate to http://localhost/post/2/johndoe
     */
    $router->get('/post/:id/:author', view('post.php', 'Post'));

    /**
     * A route that invokes a callback function
     * - navigate to http://localhost/callback
     */
    $router->get('/callback', function() {
        echo "callback executed!";
        echo "<a href='/'>&leftarrow; Home</a>";
    });

    /**
     * A dynamic route that invokes a callback function with a value
     * - navigate to http://localhost/callback/1
     */
    $router->get('/callback/:value', function(array $params) {
        echo "callback executed! - The value is " . $params['value'];
        echo "<a href='/'>&leftarrow; Home</a>";
    });

    /**
     * A dynamic route that invokes a callback function with multiple values
     * - navigate to http://localhost/callback/1/2
     */
    $router->get('/callback/:x/:y', function(array $params) {
        echo "callback executed! - X = " . $params['x'] . ", Y = " . $params['y'];
        echo "<a href='/'>&leftarrow; Home</a>";
    });

    /**
     * Combination of POST and GET on the same file: `data.php`
     * - navigate to http://localhost/data
     */
    $router->form('/data', view('data.php', 'Forms'));

    /**
     * API route that will use POST data
     */
    $router->post('/api/user', process('save_user.php'));

    /**
     * Route that will be used as default route for unregistered routes
     * - navigate to http://localhost/fake/route
     */
    $router->get('/404', view('404.php', '404'));

    /**
     * In case the requested route is not found,
     * the request will be redirected to the /404 route
     */
    $router->fallback('/404');

}