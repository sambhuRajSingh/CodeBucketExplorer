<?php

namespace CodeExplorer\Http\Controllers\CodeExplorer;

use Illuminate\Http\Request;
use CodeExplorer\Http\Requests;
use CodeExplorer\Http\Controllers\Controller;
use CodeExplorer\Components\CodeExplorer\GitVersionControlExplorer;

class CodeExplorerController extends Controller
{
    public function __construct(GitVersionControlExplorer $gitVersionControlExplorer)
    {
        $this->gitVersionControlExplorer = $gitVersionControlExplorer;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd($this->gitVersionControlExplorer->lastCommit());
        return view('welcome');
    }
}
