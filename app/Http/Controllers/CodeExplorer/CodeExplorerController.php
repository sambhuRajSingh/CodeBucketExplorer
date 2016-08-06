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
}
