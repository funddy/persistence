<?php

namespace Funddy\Component\Persistence\Doctrine;

use Doctrine\Common\Persistence\ObjectManager;

/**
 * @copyright (C) Funddy (2012)
 * @author Keyvan Akbary <keyvan@funddy.com>
 */
abstract class ObjectRepositoryManager
{
    private $repositories = array();
    protected $om;
    protected $objectRepository;

    public function __construct(ObjectManager $om, $objectRepository)
    {
        $this->om = $om;
        $this->objectRepository = $objectRepository;
    }

    public function getRepository($className)
    {
        return $this->getRepositoryFromCache($className) ?: $this->createCustomRepositoryForClass($className);
    }

    private function getRepositoryFromCache($className)
    {
        return isset($this->repositories[$className]) ? $this->repositories[$className] : null;
    }

    private function createCustomRepositoryForClass($className)
    {
        $repository = $this->createRepository($className);

        $this->repositories[$className] = $repository;

        return $repository;
    }

    abstract protected function createRepository($className);
}
