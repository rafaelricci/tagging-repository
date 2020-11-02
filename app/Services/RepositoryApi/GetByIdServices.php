<?php

namespace App\Services\RepositoryApi;

use Illuminate\Support\Facades\Http;

class GetByIdServices
{
    public function get($id)
    {
        $gitHubUr = env('GIT_HUB_API_URI').'/'.$id;
        $gitHubToken = env('GIT_HUB_API_TOKEN');
        return Http::withToken($gitHubToken)->get($gitHubUr)->json();
    }
}
