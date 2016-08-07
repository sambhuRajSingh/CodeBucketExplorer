<?php

namespace CodeExplorer\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    /**
     * Owner of the repository.
     *
     * @var string
     */
    protected $repositoryOwner;

    /**
     * Name of the repository.
     *
     * @var string
     */
    protected $repositoryName;

    /**
     * Number of item to display.
     *
     * @var int
     */
    protected $howMany;

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->repositoryOwner = (request()->session()->has('repositoryOwner'))
                                ? request()->session()->get('repositoryOwner')
                                : 'nicolas-grekas';

        $this->repositoryName = (request()->session()->has('repositoryName'))
                                ? request()->session()->get('repositoryName')
                                : 'symfony';

        $this->howMany = (request()->session()->has('howMany'))
                         ? request()->session()->get('howMany')
                         : '10';

        view()->share('repositoryOwner', $this->repositoryOwner);
        view()->share('repositoryName', $this->repositoryName);
        view()->share('howMany', $this->howMany);
    }
}
