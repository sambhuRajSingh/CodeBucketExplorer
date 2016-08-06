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
        dd($this->versionControlExplorer->lastCommit());
        return view('welcome');
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
