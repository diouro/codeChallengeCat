<?php 

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;
use Slim\App;
use Slim\Container;
use Slim\Exception\MethodNotAllowedException;
use Slim\Exception\NotFoundException;
use Slim\Exception\SlimException;
use Slim\Handlers\Error;
use Slim\Handlers\Strategies\RequestResponseArgs;
use Slim\Http\Body;
use Slim\Http\Environment;
use Slim\Http\Headers;
use Slim\Http\Request;
use Slim\Http\RequestBody;
use Slim\Http\Response;
use Slim\Http\Uri;
use Slim\Router;
use Slim\HeaderStackTestAsset;
use Slim\Tests\Mocks\MockAction;

use PHPUnit\Framework\TestCase;
use Controller\UserController;

define('BASE_URL', 'http://localhost');

final class CatapultTest extends TestCase
{
    
    public $app;
    public $router;
    public $request;
    public $userController;

    // Setup global variables
    public function setUp()
    {
        $this->app = new App();
        $this->router = $this->app->getContainer()->get('router');
        $this->userController = new UserController;

        $this->request = $this->getMockBuilder('Psr\Http\Message\ServerRequestInterface')
            ->disableOriginalConstructor()
            ->getMock();

    }

    public function testIssetInContainer()
    {    
        $this->assertTrue(isset($this->router));
    }

    public function testUserList()
    {
        
        $request = $this->getRequest("get", "/api/v1/ping");
        $response = $this->sendHttpRequest($request, $this->app);
        $this->assertEquals(200, $response->getStatusCode());        
    
    }

    // Generate request
    protected function getRequest(string $method, string $path, array $data = [])
    {
        $method = strtoupper($method);
        $env = $_SERVER;
        
        $request = Request::createFromEnvironment(Environment::mock([
            'REQUEST_METHOD'    => $method,
            'REQUEST_URI'       => $path,
            'QUERY_STRING'      => ($method == "GET") ? http_build_query($data) : ""
        ]));
        
        $request = $request->withHeader('Content-Type', 'application/json');
        
        if ($method == "POST") {
            $request->getBody()->write(json_encode($data));
        }
            
        return $request;
    }
    
    // Process request
    protected function sendHttpRequest(Request $request): Response {
        $response = $this->app->process($request, new Response());
        return $response;
    }

}

?>