<?php

declare(strict_types=1);

namespace AichaDigital\LaraVerifactuFilament\Resources\RegistryResource\Pages;

use AichaDigital\LaraVerifactuFilament\Resources\RegistryResource;
use Filament\Resources\Pages\ListRecords;

class ListRegistries extends ListRecords
{
    protected static string $resource = RegistryResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
