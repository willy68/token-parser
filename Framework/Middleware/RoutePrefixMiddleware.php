<?php

namespace Framework\Middleware;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RoutePrefixMiddleware implements MiddlewareInterface
{

    /**
     * Undocumented variable
     *
     * @var ContainerInterface
     */
    private $container;

    /**
     * Undocumented variable
     *
     * @var string
     */
    private $routePrefix;

    /**
     * Undocumented variable
     *
     * @var string
     */
    private $middleware;

    /**
     * RoutePrefixMiddleware constructor.
     * @param ContainerInterface $container
     * @param string $routePrefix
     * @param string $middleware
     */
    public function __construct(
        ContainerInterface $container,
        string $routePrefix,
        string $middleware
    ) {
        $this->container = $container;
        $this->routePrefix = $routePrefix;
        $this->middleware = $middleware;
    }

    /**
     * Process an incoming server request.
     *
     * Processes an incoming server request in order to produce a response.
     * If unable to produce the response itself, it may delegate to the provided
     * request handler to do so.
     *
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $handler
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $uri = $request->getUri()->getPath();
        if (stripos($uri, $this->routePrefix) === 0) {
            return $this->container->get($this->middleware)->process($request, $handler);
        }
        return $handler->handle($request);
    }
}
