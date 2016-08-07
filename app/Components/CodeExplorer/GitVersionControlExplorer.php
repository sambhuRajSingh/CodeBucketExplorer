<?php

namespace CodeExplorer\Components\CodeExplorer;

use Log;
use Exception;
use CodeExplorer\Utility\HttpClient;
use CodeExplorer\Components\CodeExplorer\Contracts\VersionControlExplorer;
use CodeExplorer\Components\CodeExplorer\Exceptions\VersionControlExplorerException;

class GitVersionControlExplorer implements VersionControlExplorer
{
    /**
     * The url of version control.
     *
     * @return string
     */
    private $versionControlUrl = "https://api.github.com";

    /**
     * Name of the Repository Owner.
     *
     * @return string
     */
    private $repositoryOwner = "nicolas-grekas";

    /**
     * Name of the Repository being accessed.
     *
     * @return string
     */
    private $repositoryName = "symfony";

    /**
     * A http client making an API request.
     *
     * @return CodeExplorer\Utility\HttpClient
     */
    private $httpClient;

    /**
     * Create a new Git Version Control Explorer.
     *
     * @return void
     */
    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function owner($name)
    {
        $this->repositoryOwner = $name;

        return $this;
    }

    public function repository($name)
    {
        $this->repositoryName = $name;

        return $this;
    }

    /**
     * View the last commit of the version control.
     * https://api.github.com/repos/nicolas-grekas/symfony/commits/master
     *
     * @throws \CodeExplorer\Components\CodeExplorer\Exceptions\VersionControlExplorerException
     * @return json|collection
     */
    public function lastCommit()
    {
        try {
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
     *
     * @throws \CodeExplorer\Components\CodeExplorer\Exceptions\VersionControlExplorerException
     * @return json|collection
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

            throw new VersionControlExplorerException(
                "Oops! Something Went Wrong. Unable to fetch Commits."
            );
        }
    }

    /**
     * View the list of person who contributed to the version control.
     *
     * @throws \CodeExplorer\Components\CodeExplorer\Exceptions\VersionControlExplorerException
     * @return json|collection
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

            throw new VersionControlExplorerException(
                "Oops! Something Went Wrong. Unable to Load Contributors."
            );
        }
    }

    /**
     * View the branches associated with the version control.
     *
     * @throws CodeExplorer\Components\CodeExplorer\Exceptions\VersionControlExplorerException
     * @return json|collection
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

            throw new VersionControlExplorerException(
                "Oops! Something Went Wrong. Unable to Load Branches."
            );
        }
    }

    /**
     * Make the url composed of owner and repository name.
     *
     * @return string
     */
    public function versionRepository()
    {
        return $this->versionControlUrl . '/repos/'
               . $this->repositoryOwner . '/'
               . $this->repositoryName . '/';
    }
}
