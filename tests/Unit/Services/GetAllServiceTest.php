<?php

namespace Tests\Unit\Services;

use App\Services\RepositoryApi\GetAllService;
use Tests\TestCase;

class GetAllServiceTest extends TestCase
{
    /**
     * @vcr get_all_service_test
     */
    public function testGet()
    {
        $getAllService = new GetAllService();
        $repositories = $getAllService->get();

        $this->assertNotNull($repositories[0]);
    }
}
