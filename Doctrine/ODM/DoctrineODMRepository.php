<?php

namespace Funddy\Component\Persistence\Doctrine\ODM;

/**
 * @copyright (C) Funddy (2012)
 * @author Guillermo Pascual <akira.space@gmail.com>
 * @author Keyvan Akbary <keyvan@funddy.com>
 */
abstract class DoctrineODMRepository
{
    protected $documentRepository;

    public function __construct(DocumentRepository $documentRepository)
    {
        $this->documentRepository = $documentRepository;
    }
}