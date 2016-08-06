<?php

namespace CodeExplorer\Components\CodeExplorer;

use GuzzleHttp\Client as GuzzleHttpClient;
use CodeExplorer\Components\CodeExplorer\Contracts\VersionControlExplorer;

class GitVersionControlExplorer implements VersionControlExplorer
{
    private $guzzleHttpClient;

    public function __construct(GuzzleHttpClient $guzzleHttpClient)
    {
        $this->guzzleHttpClient = $guzzleHttpClient;
    }

    /**
     * View the last commit of the version control.
     */
    public function lastCommit()
    {
        try {
            $apiUrl = "https://api.github.com/repos/nicolas-grekas/symfony/commits/master";

            $apiRequest = $this->guzzleHttpClient->request('GET', $apiUrl, []);

            $commits = collect(json_decode($apiRequest->getBody()->getContents()));

            return $commits;
            // foreach ($commits as $commit) {
            //     dd($commit->commit->author);
            // }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * View the list of commits.
     */
    public function commits($howMany = 10)
    {
        try {
            $apiUrl = "https://api.github.com/repos/nicolas-grekas/symfony/commits?per_page=10";
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * View the list of person who contributed to
     * the version control.
     */
    public function contributors($howMany = 10)
    {
    }

    /**
     * View the branches associated with the version
     * control.
     */
    public function branches($howMany = 10)
    {
    }
}
