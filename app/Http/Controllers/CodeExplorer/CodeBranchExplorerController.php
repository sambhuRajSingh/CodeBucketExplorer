<?php

namespace CodeExplorer\Http\Controllers\CodeExplorer;

use Illuminate\Http\Request;
use CodeExplorer\Http\Requests;
use CodeExplorer\Http\Controllers\Controller;
use CodeExplorer\Components\CodeExplorer\Contracts\VersionControlExplorer;
use CodeExplorer\Components\CodeExplorer\Exceptions\VersionControlExplorerException;

class CodeBranchExplorerController extends Controller
{
    /**
     * Instance of the Version Control Explorer.
     *
     * @return CodeExplorer\Components\CodeExplorer\Contracts\VersionControlExplorer;
     */
    private $versionControlExplorer;

    public function __construct(VersionControlExplorer $versionControlExplorer)
    {
        parent::__construct();

        $this->versionControlExplorer = $versionControlExplorer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $branches = $this->versionControlExplorer
                            ->owner($this->repositoryOwner)
                            ->repository($this->repositoryName)
                            ->branches($this->howMany);

            return view('branches', compact('branches'));

        } catch (VersionControlExplorerException $e) {
            notify()->flash($e->getMessage(), 'danger', ['icon' => 'times']);

            return view('error');
        }
    }
}
