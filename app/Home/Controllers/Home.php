<?php
namespace App\Home\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

/**
 * Home controller
 *
 * @author Zamrony P. Juhara <zamronypj@yahoo.com>
 */
final class Home
{
    /**
     * handle request
     * @param  Request  $request  request instance
     * @param  Response $response response instance
     * @param  array    $args     route arguments
     * @return Response new response
     */
    public function __invoke(Request $request, Response $response, $args)
    {
        return $response->write('Home');
    }
}
