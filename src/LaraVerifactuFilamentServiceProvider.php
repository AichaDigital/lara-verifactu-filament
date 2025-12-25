<?php

declare(strict_types=1);

namespace AichaDigital\LaraVerifactuFilament;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaraVerifactuFilamentServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('lara-verifactu-filament')
            ->hasTranslations();
    }
}
