<?php

namespace CodeExplorer\Http\Controllers\CodeExplorer;

use Illuminate\Http\Request;
use CodeExplorer\Http\Requests;
use CodeExplorer\Http\Controllers\Controller;
use CodeExplorer\Components\CodeExplorer\Contracts\VersionControlExplorer;

class CodeExplorerController extends Controller
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

        $commits = $this->versionControlExplorer
                        ->owner($repositoryOwner)
                        ->repository($repositoryName)
                        ->commits();

        return view('home', compact('repositoryName', 'repositoryOwner', 'commits'));
    }

    /**
     * Register a new owner and repository name for the code Explorer.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->session()->put('repositoryOwner', $request->repositoryOwner);
        $request->session()->put('repositoryName', $request->repositoryName);

        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lastCommit()
    {
        dd($this->versionControlExplorer->lastCommit());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function commits()
    {
        dd($this->versionControlExplorer->commits());
    }

    /**
     * Display a contributor ofs the version control.
     *
     * @return \Illuminate\Http\Response
     */
    public function contributors()
    {
        dd($this->versionControlExplorer->contributors());
    }

    /**
     * Display a branches of the Version Control.
     *
     * @return \Illuminate\Http\Response
     */
    public function branches()
    {
        dd($this->versionControlExplorer->branches());
    }
}
