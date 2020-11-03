<?php

namespace App\Services\RepositoryApi;

class GitHubApi
{
    private $gitHubUri;
    private $gitHubToken;

    public function __construct()
    {
        $this->gitHubUri = env('GIT_HUB_API_URI');
        $this->gitHubToken = env('GIT_HUB_API_TOKEN');
    }

    public function getGitHubUri()
    {
        return $this->gitHubUri;
    }

    public function getGitHubToken()
    {
        return $this->gitHubToken;
    }
}
