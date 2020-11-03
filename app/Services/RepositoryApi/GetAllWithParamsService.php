<?php

namespace App\Services\RepositoryApi;

use Illuminate\Support\Facades\Http;
use App\Services\RepositoryApi\GitHubApi;

class GetAllWithParamsService extends GitHubApi
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get($params)
    {
        $build_query = http_build_query($this->buildUri($params));
        $urlDecode = urldecode($build_query);
        $gitHubUri = $this->getGitHubUri().'/search/repositories?'.$urlDecode;
        $gitHubToken = $this->getGitHubToken();
        return Http::withToken($gitHubToken)->get($gitHubUri)->json();
    }

    private function buildUri($params)
    {
        $arrayParams = [
            'q' => $this->defineTerm($params),
            'sort' => $this->checkExistedStars($params->stars),
            'order' => $params->order
        ];

        return $this->clearKeysEmpty($arrayParams);
    }

    private function clearKeysEmpty($arrayParams)
    {
        foreach($arrayParams as $key=>$value)
        {
            if(is_null($value) || $value == '')
            {
                unset($arrayParams[$key]);
            }
        }

        return $arrayParams;
    }

    private function defineTerm($params)
    {
        if(is_null($params->language) || $params->language == '')
        {
            return $params->term;
        }

        return $params->term.'+language:'.$params->language;
    }

    private function checkExistedStars($stars)
    {
        if($stars == 'on')
        {
            return 'stars';
        }
    }
}
