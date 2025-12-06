<?php

namespace AichaDigital\LaraVerifactuFilament;

use AichaDigital\LaraVerifactuFilament\Commands\LaraVerifactuFilamentCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaraVerifactuFilamentServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('lara-verifactu-filament')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_lara_verifactu_filament_table')
            ->hasCommand(LaraVerifactuFilamentCommand::class);
    }
}
