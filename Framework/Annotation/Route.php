<?php
namespace Framework\Annotation;

/**
 * @Annotation
 * @Target({"CLASS", "METHOD"})
 * 
 */
class Route
{
    private $parameters = [];

    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
    }

    public function getParameters(): array
    {
        return $this->parameters;
    }
}
