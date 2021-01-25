<?php

namespace Framework\Loader;

use Doctrine\Common\Annotations\Reader;
use Framework\Parser\PhpTokenParser;

class FileLoader extends ClassLoader
{
    protected $parser;

    public function __construct(PhpTokenParser $parser, ?Reader $reader = null)
    {
       $this->parser = $parser; 
    }

    public function load(string $file)
    {
        if (!is_file($file)) {
            return null;
        }

        $class = $this->parser->findClass($file);

        if ($class) {
            $reflectionClass = new \ReflectionClass($class);
            $classAnnotation = $this->getClassAnnotation($reflectionClass);

            foreach($reflectionClass->getMethods() as $method) {
                foreach($this->getMethodAnnotations($method) as $methodAnnotation) {
                    $methodAnnotations[] = $methodAnnotation;
                }
            }
            return [$classAnnotation, $methodAnnotation];
            
        }

        return null;
    }

}
