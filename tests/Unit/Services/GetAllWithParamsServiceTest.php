<?php

namespace Tests\Unit\Services;

use App\Services\RepositoryApi\GetAllWithParamsService;
use Tests\TestCase;
use Illuminate\Http\Request;

class GetAllWithParamsServiceTest extends TestCase
{
    /**
     * @vcr get_all_service_with_params_test
     */
    public function testGet()
    {
        $params = new Request([
            "term" => "test",
            "language" => "ruby",
            "order" => "desc",
            "stars" => "on"
        ]);

        $getAllService = new GetAllWithParamsService();
        $repositories = $getAllService->get($params)['items'];

        $this->assertNotNull($repositories[0]);
    }
}
