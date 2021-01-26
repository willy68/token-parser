<?php

namespace Framework\Actions\Controllers\User;

use Framework\Annotation\Route;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * @Route("/api")
 */
class UserController
{

    /**
     * \DI\Container
     *
     * @var ContainerInterface $container
     */
    private $container;

    /**
     * UserController constructor.
     * @param ContainerInterface $c
     */
    public function __construct(ContainerInterface $c)
    {
        $this->container = $c;
    }

    /**
     * 
     * @Route("/users", name="users.list")
     * 
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function list(ServerRequestInterface $request): ?ResponseInterface
    {
        return null;
    }

    /**
     * @Route("user/create", name="user.create", methods={"POST"})
     *
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function create(ServerRequestInterface $request): ?ResponseInterface
    {
        return null;
    }

    /**
     * login
     *
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     * @throws \Exception
     */
    public function login(ServerRequestInterface $request): ?ResponseInterface
    {
        return null;
    }

    /**
     * Authenticate user
     *
     * @param ServerRequestInterface $request
     * @param array $user
     * @param int $exp
     * @param int $nbf
     * @return string
     * @throws \Exception
     */
    protected function authenticate(
        ServerRequestInterface $request,
        array $user,
        int $exp = 3600,
        int $nbf = 0
    ) {
    }

    /**
     * Create Jwt token
     *
     * @param array $user
     * @param int $exp
     * @param int $nbf
     * @return string
     * @throws \Exception
     */
    protected function createJwt(array $user, int $exp = 3600, int $nbf = 0): string
    {
        return '';
    }
}
