<?php

namespace CodeExplorer\Components\CodeExplorer\Providers;

use Illuminate\Support\ServiceProvider;
use CodeExplorer\Components\CodeExplorer\GitVersionControlExplorer;
use CodeExplorer\Components\CodeExplorer\Contracts\VersionControlExplorer;

class CodeExplorerServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(VersionControlExplorer::class, GitVersionControlExplorer::class);
    }
}