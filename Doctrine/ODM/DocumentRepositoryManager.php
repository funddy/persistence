<?php

namespace Funddy\Component\Persistence\Doctrine\ODM;

use Funddy\Component\Persistence\Doctrine\ObjectRepositoryManager;

/**
 * @copyright (C) Funddy (2012)
 * @author Guillermo Pascual <akira.space@gmail.com>
 * @author Keyvan Akbary <keyvan@funddy.com>
 */
class DocumentRepositoryManager extends ObjectRepositoryManager
{
    public function createRepository($className)
    {
        $metadata = $this->om->getClassMetadata($className);

        $documentRepository = new $this->objectRepository($this->om, $this->om->getUnitOfWork(), $metadata);

        return new $metadata->customRepositoryClassName($documentRepository);
    }
}