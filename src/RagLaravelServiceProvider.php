<?php

namespace Ontherocksoftware\RagLaravel;

use Ontherocksoftware\RagLaravel\Commands\RagLaravelCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class RagLaravelServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('rag-laravel')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_rag_laravel_table')
            ->hasCommand(RagLaravelCommand::class);
    }
}
