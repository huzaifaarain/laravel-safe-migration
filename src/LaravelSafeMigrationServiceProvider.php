<?php

namespace MuhammadHuzaifa\LaravelSafeMigration;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use MuhammadHuzaifa\LaravelSafeMigration\Commands\LaravelSafeMigrationCommand;
use Illuminate\Console\Events\CommandStarting;
use MuhammadHuzaifa\LaravelSafeMigration\Listeners\CheckIfCommandIsMonitorable;

class LaravelSafeMigrationServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-safe-migration')
            ->hasConfigFile();

        $this->app['events']->listen(CommandStarting::class, CheckIfCommandIsMonitorable::class);
    }
}
