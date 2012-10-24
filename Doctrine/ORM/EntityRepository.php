<?php

namespace Funddy\Component\Persistence\Doctrine\ORM;

use Doctrine\ORM\EntityRepository as BaseEntityRepository;

/**
 * @copyright (C) Funddy (2012)
 * @author Keyvan Akbary <keyvan@funddy.com>
 */
class EntityRepository extends BaseEntityRepository
{
    public function add($entity)
    {
        $this->_em->persist($entity);
    }

    public function remove($entity)
    {
        $this->_em->remove($entity);
    }

    public function flush()
    {
        $this->_em->flush();
    }
}