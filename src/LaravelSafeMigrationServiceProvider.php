<?php

namespace MuhammadHuzaifa\LaravelSafeMigration;

use Illuminate\Console\Events\CommandStarting;
use MuhammadHuzaifa\LaravelSafeMigration\Listeners\CheckIfCommandIsMonitorable;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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

        if (! $this->isPackageEnabled()) {
            return;
        }

        $this->app['events']->listen(CommandStarting::class, CheckIfCommandIsMonitorable::class);
    }

    private function isPackageEnabled()
    {
        return config('safe-migration.safe_migration_enabled');
    }
}
