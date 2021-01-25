<?php
namespace Framework\Annotation;

use Framework\Annotation\Exception\RouteAnnotationException;

/**
 * 
 * Ex: @Route("/path/route/{id:\d+}", name="path.route", methods={"GET"})
 * 
 * @Annotation
 * @Target({"CLASS", "METHOD"})
 * 
 */
class Route
{
    private $parameters = [];

    private $path;
    private $name;
    private $host;
    private $methods = [];
    private $schemes = [];

    public function __construct($parameters = [])
    {
        // Method param name
        if (!isset($parameters['value'])) {
            throw new RouteAnnotationException(sprintf(
                '@Route("/path/route/{id:\d+}", name="path.route", methods={"GET"}) expects parameter "name", %s given.',
                json_encode($parameters)
            ));
        }
        $this->parameters = $parameters;

        $this->path = $parameters['value'];
        $this->name = $parameters['name'] ?? null;
        $this->host = $parameters['host'] ?? null;
        $this->methods = $parameters['methods'];
        $this->schemes = $parameters['schemes'] ?? null;

    }

    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * Get the value of path
     */ 
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of host
     */ 
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Get the value of methods
     */ 
    public function getMethods()
    {
        return $this->methods;
    }

    /**
     * Get the value of schemes
     */ 
    public function getSchemes()
    {
        return $this->schemes;
    }
}
