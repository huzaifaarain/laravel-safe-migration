<?php

// config for MuhammadHuzaifa/LaravelSafeMigration
return [
    /*
    |--------------------------------------------------------------------------
    | Commands To Monitor
    |--------------------------------------------------------------------------
    |
    | This value determined which commands package should listen to
    | make database backup before executing it.
    |
    */

    "commands_to_monitor" => [
        "migrate",
        'migrate:fresh',
        'migrate:refresh',
        'migrate:reset',
        'migrate:rollback',
    ],

    /*
    |--------------------------------------------------------------------------
    | Stop On Fail
    |--------------------------------------------------------------------------
    |
    | This value determined whether the migration should continue or not if the
    | backup creation fail.
    |
    */

    "stop_on_fail" => true,

    /*
    |--------------------------------------------------------------------------
    | Filename
    |--------------------------------------------------------------------------
    |
    | You can set the filename here. Timestamp and the extension will be appended
    | during the generation of the backup.
    |
    */

    "filename" => "safe-migration",
];
