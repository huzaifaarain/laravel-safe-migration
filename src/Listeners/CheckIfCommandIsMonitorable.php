<?php

namespace MuhammadHuzaifa\LaravelSafeMigration\Listeners;

use Illuminate\Console\Command;
use Illuminate\Console\Events\CommandStarting;
use MuhammadHuzaifa\LaravelSafeMigration\LaravelSafeMigration;

class CheckIfCommandIsMonitorable
{
    /**
     * Handle the given event.
     */
    public function handle(CommandStarting $event): void
    {
        $command = $event->command;
        new LaravelSafeMigration($command);
    }
}
