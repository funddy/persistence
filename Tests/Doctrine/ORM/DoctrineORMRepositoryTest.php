<?php

namespace Funddy\Component\Persistence\Tests\Doctrine\ORM;

use Mockery as m;

abstract class DoctrineORMRepositoryTest extends \PHPUnit_Framework_TestCase
{
    const IRRELEVANT_FIELD_VALUE = 'XXXXX';

    protected $entityRepositoryMock;

    public function __construct()
    {
        $this->entityRepositoryMock = m::mock('Funddy\Component\Persistence\Doctrine\ORM\EntityRepository');
    }

    protected function documentRepositoryFindOneByShouldBeCalledWithAndReturn(array $with, $return)
    {
        $this->entityRepositoryMock->shouldReceive('findOneBy')->with($with)->once()
            ->andReturn($return);
    }

    protected function documentRepositoryFindByShouldBeCalledWithAndReturn(array $with, $return)
    {
        $this->entityRepositoryMock->shouldReceive('findBy')->with($with)->once()
            ->andReturn($return);
    }

    protected function documentRepositoryAddShouldBeCalledWith($with)
    {
        $this->entityRepositoryMock->shouldReceive('add')->with($with)->once();
    }

    protected function documentRepositoryRemoveShouldBeCalledWith($with)
    {
        $this->entityRepositoryMock->shouldReceive('remove')->with($with)->once();
    }

    protected function documentRepositoryFlushShouldBeCalledWithNoArgs()
    {
        $this->entityRepositoryMock->shouldReceive('flush')->withNoArgs()->once();
    }

    protected function documentRepositoryCreateQueryBuilderShouldReturn($queryBuilderMock)
    {
        $this->entityRepositoryMock->shouldReceive('createQueryBuilder')->withNoArgs()->once()
            ->andReturn($queryBuilderMock);
    }

    protected function createQueryBuilderMock()
    {
        return m::mock('Doctrine\ORM\QueryBuilder');
    }
}