<?php

namespace CodeExplorer\Http\Controllers\CodeExplorer;

use Illuminate\Http\Request;
use CodeExplorer\Http\Requests;
use CodeExplorer\Http\Controllers\Controller;
use CodeExplorer\Components\CodeExplorer\Contracts\VersionControlExplorer;
use CodeExplorer\Components\CodeExplorer\Exceptions\VersionControlExplorerException;

class CodeContributorExplorerController extends Controller
{
    /**
     * Instance of the Version Control Explorer.
     *
     * @return CodeExplorer\Components\CodeExplorer\Contracts\VersionControlExplorer;
     */
    private $versionControlExplorer;

    /**
     * Create a new code contributor explorer instance.
     *
     * @param \CodeExplorer\Components\CodeExplorer\Contracts\VersionControlExplorer $versionControlExplorer     *
     * @return void
     */
    public function __construct(VersionControlExplorer $versionControlExplorer)
    {
        parent::__construct();

        $this->versionControlExplorer = $versionControlExplorer;
    }

    /**
     * Get a list of contributors and pass it on to view.
     *
     * @throws \CodeExplorer\Components\CodeExplorer\Exceptions\VersionControlExplorerException
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $contributors = $this->versionControlExplorer
                            ->owner($this->repositoryOwner)
                            ->repository($this->repositoryName)
                            ->contributors($this->howMany);

            return view('contributors', compact('contributors'));
        } catch (VersionControlExplorerException $e) {
            notify()->flash($e->getMessage(), 'danger', ['icon' => 'times']);

            return view('error')->with('repositoryName', $this->repositoryName)
                                ->with('repositoryOwner', $this->repositoryOwner);
        }
    }
}
