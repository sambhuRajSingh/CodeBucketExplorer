<?php

namespace CodeExplorer\Components\CodeExplorer\Contracts;

interface VersionControlExplorer
{
    /**
     * View the last commit of the version control.
     */
    public function lastCommit();

    /**
     * View the list of commits.
     */
    public function commits($howMany = 10);

    /**
     * View the list of person who contributed to
     * the version control.
     */
    public function contributors($howMany = 10);

    /**
     * View the branches associated with the version
     * control.
     */
    public function branches($howMany = 10);
}
