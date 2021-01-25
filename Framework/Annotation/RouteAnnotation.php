<?php
namespace Framework\Annotation;

/**
 * @Annotation
 * @Target({"METHOD"})
 * 
 */
class RouteAnnotation
{
    private $parameters = [];

    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
    }
}
