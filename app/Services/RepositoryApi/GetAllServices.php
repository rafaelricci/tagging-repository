<?php

namespace App\Services\RepositoryApi;

use Illuminate\Support\Facades\Http;

class GetAllServices
{
    public function get()
    {
        $gitHubUr = env('GIT_HUB_API_URI');
        $gitHubToken = env('GIT_HUB_API_TOKEN');
        return Http::withToken($gitHubToken)->get($gitHubUr)->json();
    }
}
