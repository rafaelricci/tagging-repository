<?php

namespace Tests\Unit\Services;

use App\Services\RepositoryApi\GetByIdService;
use Tests\TestCase;

class GetByIdServiceTest extends TestCase
{
    /**
     * @vcr get_by_id_service_test
     */
    public function testGet()
    {
        $getByIdService = new GetByIdService();
        $repository = $getByIdService->get(1);
        $this->assertEquals($repository['full_name'], 'mojombo/grit');
    }
}
