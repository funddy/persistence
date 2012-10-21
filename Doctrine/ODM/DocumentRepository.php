<?php

namespace Funddy\Component\Persistence\Doctrine\ODM;

use Doctrine\ODM\MongoDB\DocumentRepository as BaseDocumentRepository;

/**
 * @copyright (C) Funddy (2012)
 * @author Guillermo Pascual <akira.space@gmail.com>
 * @author Keyvan Akbary <keyvan@funddy.com>
 */
class DocumentRepository extends BaseDocumentRepository
{
    public function add($document)
    {
        $this->dm->persist($document);
    }

    public function remove($document)
    {
        $this->dm->remove($document);
    }

    public function flush()
    {
        $this->dm->flush();
    }
}