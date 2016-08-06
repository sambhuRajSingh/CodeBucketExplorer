<?php

namespace CodeExplorer\Components\CodeExplorer;

use Log;
use Exception;
use CodeExplorer\Utility\HttpClient;
use CodeExplorer\Components\CodeExplorer\Contracts\VersionControlExplorer;
use CodeExplorer\Components\CodeExplorer\Exceptions\VersionControlExplorerException;

class GitVersionControlExplorer implements VersionControlExplorer
{
    private $versionControlUrl = "https://api.github.com";

    private $repositoryOwner = "nicolas-grekas";

    private $repositoryName = "symfony";

    private $httpClient;

    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * View the last commit of the version control.
     */
    public function lastCommit()
    {
        try {
            // $url = "https://api.github.com/repos/nicolas-grekas/symfony/commits/master";
            $url = $this->versionRepository() . "commits/master";

            return $this->httpClient
                 ->request($url)
                 ->contents();

        } catch (Exception $e) {

            Log::info($e->getMessage());

            throw new VersionControlExplorerException("Oops! Something Went Wrong. Unable to fetch last commit.");
        }
    }

    /**
     * View the list of commits.
     */
    public function commits($howMany = 10)
    {
        try {
            $url = $this->versionRepository() . "commits?per_page={$howMany}";

            return $this->httpClient
                 ->request($url)
                 ->contents();

        } catch (Exception $e) {

            Log::info($e->getMessage());

            throw new VersionControlExplorerException("Oops! Something Went Wrong. Unable to fetch Commits.");
        }
    }

    /**
     * View the list of person who contributed to
     * the version control.
     */
    public function contributors($howMany = 10)
    {
        try {
            $url = $this->versionRepository() . "contributors?per_page={$howMany}";

            return $this->httpClient
                 ->request($url)
                 ->contents();

        } catch (Exception $e) {

            Log::info($e->getMessage());

            throw new VersionControlExplorerException("Oops! Something Went Wrong. Unable to Load Contributors.");
        }
    }

    /**
     * View the branches associated with the version
     * control.
     */
    public function branches($howMany = 10)
    {
        try {
            $url = $this->versionRepository() . "branches?per_page={$howMany}";

            return $this->httpClient
                 ->request($url)
                 ->contents();

        } catch (Exception $e) {

            Log::info($e->getMessage());

            throw new VersionControlExplorerException("Oops! Something Went Wrong. Unable to Load Branches.");
        }
    }

    public function versionRepository()
    {
        return $this->versionControlUrl . '/repos/'
               . $this->repositoryOwner . '/'
               . $this->repositoryName . '/';
    }
}
