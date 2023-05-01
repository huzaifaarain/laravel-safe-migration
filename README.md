# Laravel Safe Migrations

[![Latest Version on Packagist](https://img.shields.io/packagist/v/muhammadhuzaifa/laravel-safe-migration.svg?style=flat-square)](https://packagist.org/packages/muhammadhuzaifa/laravel-safe-migration)
[![Total Downloads](https://img.shields.io/packagist/dt/muhammadhuzaifa/laravel-safe-migration.svg?style=flat-square)](https://packagist.org/packages/muhammadhuzaifa/laravel-safe-migration)

- [Laravel Safe Migrations](#laravel-safe-migrations)
  - [Installation](#installation)
  - [Usage](#usage)
  - [Changelog](#changelog)
  - [Credits](#credits)
  - [License](#license)


The package provides safest way to run migration by generating backup of the database each time before the monitorable command probably the `migrate*` command is executed.

The `laravel-safe-migration` package feature for generating backup is build on top of [spatie/laravel-backup](https://github.com/spatie/laravel-backup) package.

## Installation

You can install the package via composer:

```bash
composer require muhammadhuzaifa/laravel-safe-migration
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-safe-migration-config"
```

This is the contents of the published config file:

```php
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
```

## Usage

Once the package is installed and monitorable commands are configured under the `config/safe-migration.php` file. Each time you execute the monitorable command, the package will generate a backup file on the `local` disk by default. The backups can be found at `storage/app/Laravel`. You can customize the disks and other options using spatie `config/backup.php` file.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Muhammad Huzaifa](https://github.com/huzaifaarain)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
