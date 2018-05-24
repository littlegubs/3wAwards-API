<?php

namespace AppBundle\Manager;

class FileManager
{
    /**
     * @var string
     */
    protected $rootDir;

    public function __construct($rootDir)
    {
        $this->rootDir = $rootDir;
    }

    public function xd()
    {
        return $this->rootDir;
    }
}
