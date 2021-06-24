<?php

namespace Nin\Repositories;

use Nin\Services\FooServiceInterface;

class FooRepository implements FooRepositoryInterface
{
    protected FooServiceInterface $fooService;

    public function __construct(FooServiceInterface $fooService)
    {
        $this->fooService = $fooService;
    }

    public function getBar(): string
    {
        return $this->fooService->getBar();
    }

}
