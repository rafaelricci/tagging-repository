<?php

namespace App\Services\RepositoryApi;

use Illuminate\Support\Facades\Http;
use App\Services\RepositoryApi\GitHubApi;

class GetByIdService extends GitHubApi
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function get($id)
    {
        $gitHubUri = $this->getGitHubUri().'/repositories/'.$id;
        $gitHubToken = $this->getGitHubToken();
        return Http::withToken($gitHubToken)->get($gitHubUri)->json();
    }
}
