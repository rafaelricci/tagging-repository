<?php

namespace App\Services\RepositoryApi;

use Illuminate\Support\Facades\Http;
use App\Services\RepositoryApi\GitHubApi;

class GetAllService extends GitHubApi
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function get()
    {
        $gitHubUri = $this->getGitHubUri().'/repositories';
        $gitHubToken = $this->getGitHubToken();
        return Http::withToken($gitHubToken)->get($gitHubUri)->json();
    }
}
