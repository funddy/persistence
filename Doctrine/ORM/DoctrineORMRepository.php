<?php

namespace Funddy\Component\Persistence\Doctrine\ORM;

/**
 * @copyright (C) Funddy (2012)
 * @author Keyvan Akbary <keyvan@funddy.com>
 */
abstract class DoctrineORMRepository
{
    protected $entityRepository;

    public function __construct(EntityRepository $entityRepository)
    {
        $this->entityRepository = $entityRepository;
    }
}