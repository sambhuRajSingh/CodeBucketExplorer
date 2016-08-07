<?php

namespace CodeExplorer\Http\Controllers\CodeExplorer;

use Illuminate\Http\Request;
use CodeExplorer\Http\Requests;
use CodeExplorer\Http\Controllers\Controller;
use CodeExplorer\Components\CodeExplorer\Contracts\VersionControlExplorer;
use CodeExplorer\Components\CodeExplorer\Exceptions\VersionControlExplorerException;

class CodeExplorerController extends Controller
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
            $commits = $this->versionControlExplorer
                            ->owner($this->repositoryOwner)
                            ->repository($this->repositoryName)
                            ->commits($this->howMany);

            return view('home', compact('commits'));

        } catch (VersionControlExplorerException $e) {
            notify()->flash($e->getMessage(), 'danger', ['icon' => 'times']);

            return view('error');
        }
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
        $request->session()->put('howMany', $request->howMany);

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
