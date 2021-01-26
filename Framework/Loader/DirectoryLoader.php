<?php

namespace Framework\Loader;

use Framework\Router\Router;
use Framework\Parser\PhpTokenParser;
use Doctrine\Common\Annotations\Reader;

class DirectoryLoader extends FileLoader
{

    public function __construct(
        PhpTokenParser $parser,
        Router $router,
        ?Reader $reader = null
    ) {
        parent::__construct($parser, $router, $reader);
    }

    public function getFiles(string $path)
    {
        // from https://stackoverflow.com/a/41636321
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator(
                $path,
                \FilesystemIterator::FOLLOW_SYMLINKS | \FilesystemIterator::SKIP_DOTS
            )
        );
        return array_filter(iterator_to_array($iterator), function ($file) {
            return ('.' !== substr($file->getBasename(), 0, 1) &&
            '.php' === substr($file->getFilename(), -4));
        });
        /*
        $allFiles = iterator_to_array(
            new \RecursiveIteratorIterator(
                new \RecursiveCallbackFilterIterator(
                    new \RecursiveDirectoryIterator(
                        $path,
                        \FilesystemIterator::FOLLOW_SYMLINKS | \FilesystemIterator::SKIP_DOTS
                    ),
                    function (\SplFileInfo $fileInfo) {
                        return ('.' !== substr($fileInfo->getBasename(), 0, 1) ||
                        '.php' === substr($fileInfo->getFilename(), -4));
                    }
                ),
                \RecursiveIteratorIterator::LEAVES_ONLY
            )
        );
        return $allFiles;*/
    }
}
