<?php

namespace Cybernerdie\ModelActivityLog;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Cybernerdie\ModelActivityLog\Commands\ModelActivityLogCommand;

class ModelActivityLogServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-model-activity-log')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-model-activity-log_table')
            ->hasCommand(ModelActivityLogCommand::class);
    }
}
