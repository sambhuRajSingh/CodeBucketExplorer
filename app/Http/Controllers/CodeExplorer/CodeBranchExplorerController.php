<?php

namespace CodeExplorer\Http\Controllers\CodeExplorer;

use Illuminate\Http\Request;
use CodeExplorer\Http\Requests;
use CodeExplorer\Http\Controllers\Controller;
use CodeExplorer\Components\CodeExplorer\Contracts\VersionControlExplorer;
use CodeExplorer\Components\CodeExplorer\Exceptions\VersionControlExplorerException;

class CodeBranchExplorerController extends Controller
{
    public function __construct(VersionControlExplorer $versionControlExplorer)
    {
        $this->versionControlExplorer = $versionControlExplorer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repositoryOwner = (request()->session()->has('repositoryOwner'))
                            ? request()->session()->get('repositoryOwner')
                            : 'nicolas-grekas';

        $repositoryName = (request()->session()->has('repositoryName'))
                            ? request()->session()->get('repositoryName')
                            : 'symfony';

        try {


            $branches = $this->versionControlExplorer
                            ->owner($repositoryOwner)
                            ->repository($repositoryName)
                            ->branches();

            return view('branches', compact('repositoryName', 'repositoryOwner', 'branches'));
        } catch (VersionControlExplorerException $e) {
            notify()->flash($e->getMessage(), 'danger', ['icon' => 'times']);

            return view('error', compact('repositoryName', 'repositoryOwner'));
        }
    }
}
