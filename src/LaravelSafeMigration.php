<?php

namespace MuhammadHuzaifa\LaravelSafeMigration;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use MuhammadHuzaifa\LaravelSafeMigration\Exceptions\BackupFailedException;

class LaravelSafeMigration
{
    public function __construct($command)
    {
        if (!$this->isMonitorableCommand($command)) {
            return;
        }
        $this->generateBackup();
    }

    private function isMonitorableCommand($command): bool
    {
        return in_array($command, config('safe-migration.commands_to_monitor', []));
    }

    private function generateBackup(): void
    {
        $filename = config('safe-migration.filename', 'safe-migration');

        $statusCode = Artisan::call(
            "backup:run",
            [
                "--filename" => "$filename-" . date("Y-m-d-h:i:s") . ".zip",
                "--disable-notifications" => true,
                "--only-db" => true,
            ]
        );

        $artisanOutput = Artisan::output();
        if ($statusCode !== Command::SUCCESS && config('safe-migration.stop_on_fail') === true) {
            throw new BackupFailedException($artisanOutput);
        }

        echo $artisanOutput;
    }
}
