<?php

namespace Tests\Unit\Services;

use VCR\VCR; 
use App\Services\RepositoryApi\GetByIdService;
use Tests\TestCase;

class GetByIdServiceTest extends TestCase
{
    /**
     * @vcr get_by_id_service_test.yml
     */
    public function testGet()
    {
        $getByIdService = new GetByIdService();
        $repository = $getByIdService->get(1);
        $this->assertEquals($repository['full_name'], 'mojombo/grit');
    }
}
