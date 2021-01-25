<?php

namespace Framework\Loader;

use Framework\Annotation\Route;
use Doctrine\Common\Annotations\Reader;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;

class ClassLoader
{
    protected $reader;

    protected $annotationClass = Route::class;

    public function __construct(?Reader $reader = null)
    {
        $this->reader = $reader;
    }

    /**
     * Change Annotation class
     *
     * @param string $class
     * @return void
     */
    public function setAnnotation(string $class)
    {
        $this->annotationClass = $class;
    }

    /**
     * Get the annotation class
     *
     * @param \ReflectionClass $class
     * @return object|null
     */
    protected function getClassAnnotation(\ReflectionClass $class): ?object
    {
        // Look for @Route annotation
        try {
            $annotation = $this->getAnnotationReader()
                ->getClassAnnotation(
                    $class,
                    $this->annotationClass
                );
        } catch (\Exception $e) {
            throw new \Exception(sprintf(
                '@Route annotation on %s is malformed. %s',
                $class->getName(),
                $e->getMessage()
            ), 0, $e);
        }

        if ($annotation instanceof $this->annotationClass) {
            return $annotation;
        }

        return null;
    }

    /**
     * @return AnnotationReader The annotation reader
     */
    public function getAnnotationReader(): Reader
    {
        if ($this->reader === null) {
            AnnotationRegistry::registerLoader('class_exists');
            $this->reader = new AnnotationReader();
        }

        return $this->annotationReader;
    }
}
