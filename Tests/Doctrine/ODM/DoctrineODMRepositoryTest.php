<?php

namespace Funddy\Component\Persistence\Tests\Doctrine\ODM;

use Mockery as m;

abstract class DoctrineODMRepositoryTest extends \PHPUnit_Framework_TestCase
{
    const IRRELEVANT_FIELD_VALUE = 'XXXXX';

    protected $documentRepositoryMock;

    public function __construct()
    {
        $this->documentRepositoryMock = m::mock('Funddy\Component\Persistence\Doctrine\ODM\DocumentRepository');
    }

    protected function documentRepositoryFindOneByShouldBeCalledWithAndReturn(array $with, $return)
    {
        $this->documentRepositoryMock->shouldReceive('findOneBy')->with($with)->once()
            ->andReturn($return);
    }

    protected function documentRepositoryFindByShouldBeCalledWithAndReturn(array $with, $return)
    {
        $this->documentRepositoryMock->shouldReceive('findBy')->with($with)->once()
            ->andReturn($return);
    }

    protected function documentRepositoryAddShouldBeCalledWith($with)
    {
        $this->documentRepositoryMock->shouldReceive('add')->with($with)->once();
    }

    protected function documentRepositoryRemoveShouldBeCalledWith($with)
    {
        $this->documentRepositoryMock->shouldReceive('remove')->with($with)->once();
    }

    protected function documentRepositoryFlushShouldBeCalledWithNoArgs()
    {
        $this->documentRepositoryMock->shouldReceive('flush')->withNoArgs()->once();
    }

    protected function documentRepositoryCreateQueryBuilderShouldReturn($queryBuilderMock)
    {
        $this->documentRepositoryMock->shouldReceive('createQueryBuilder')->withNoArgs()->once()
            ->andReturn($queryBuilderMock);
    }

    protected function createQueryBuilderMock()
    {
        return m::mock('Doctrine\ODM\MongoDB\Query\Builder');
    }
}