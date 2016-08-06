<?php

namespace CodeExplorer\Utility;

use GuzzleHttp\Client as GuzzleHttpClient;

class HttpClient
{
    /**
     * Result json data after making http client request.
     *
     * @var json
     */
    private $apiRequest;

    /**
     * Create a new Http Client Instance.
     *
     * @return void
     */
    public function __construct(GuzzleHttpClient $guzzleHttpClient)
    {
        $this->guzzleHttpClient = $guzzleHttpClient;
    }

    /**
     * Make a api requst on the provided url.
     *
     * @return CodeExplorer\Utility\HttpClient
     */
    public function request($url, $method = 'GET', $extraParams = [])
    {
        $this->apiRequest = $this->guzzleHttpClient->request($method, $url, $extraParams);

        return $this;
    }

    /**
     * Parse the api json.
     *
     * @return json|collection
     */
    public function contents($isRaw = false, $asCollection = true)
    {
        $contents = $this->apiRequest->getBody()->getContents();

        if (!$isRaw) {
            $contents = json_decode();
        }

        if ($asCollection) {
            $commits = collect($contents);
        }

        return $contents;
    }
}
