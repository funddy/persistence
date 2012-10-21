<?php

namespace Funddy\Component\Persistence\Doctrine\ODM;

use Doctrine\Common\Persistence\ObjectManager;

/**
 * @copyright (C) Funddy (2012)
 * @author Guillermo Pascual <akira.space@gmail.com>
 * @author Keyvan Akbary <keyvan@funddy.com>
 */
class ObjectRepositoryManager
{
    private $repositories = array();
    private $om;
    private $objectRepository;

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
        $metadata = $this->om->getClassMetadata($className);

        $documentRepository = new $this->objectRepository($this->om, $this->om->getUnitOfWork(), $metadata);
        $repository = new $metadata->customRepositoryClassName($documentRepository);

        $this->repositories[$className] = $repository;

        return $repository;
    }
}