<?php

declare(strict_types=1);

namespace AichaDigital\LaraVerifactuFilament;

use AichaDigital\LaraVerifactuFilament\Resources\RegistryResource;
use Filament\Contracts\Plugin;
use Filament\Panel;

class LaraVerifactuFilamentPlugin implements Plugin
{
    protected bool $hasRegistryResource = true;

    public function getId(): string
    {
        return 'lara-verifactu-filament';
    }

    public function register(Panel $panel): void
    {
        $resources = [];

        if ($this->hasRegistryResource) {
            $resources[] = RegistryResource::class;
        }

        $panel->resources($resources);
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }

    public function registryResource(bool $condition = true): static
    {
        $this->hasRegistryResource = $condition;

        return $this;
    }

    public function hasRegistryResource(): bool
    {
        return $this->hasRegistryResource;
    }
}
