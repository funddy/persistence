<?php

namespace Funddy\Component\Persistence\Doctrine\ORM;

use Funddy\Component\Persistence\Doctrine\ObjectRepositoryManager;

/**
 * @copyright (C) Funddy (2012)
 * @author Guillermo Pascual <akira.space@gmail.com>
 * @author Keyvan Akbary <keyvan@funddy.com>
 */
class EntityRepositoryManager extends ObjectRepositoryManager
{
    public function createRepository($className)
    {
        $metadata = $this->om->getClassMetadata($className);

        $documentRepository = new $this->objectRepository($this->om, $metadata);

        return new $metadata->customRepositoryClassName($documentRepository);
    }
}