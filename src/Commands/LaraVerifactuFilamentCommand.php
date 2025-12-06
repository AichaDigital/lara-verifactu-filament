<?php

namespace AichaDigital\LaraVerifactuFilament\Commands;

use Illuminate\Console\Command;

class LaraVerifactuFilamentCommand extends Command
{
    public $signature = 'lara-verifactu-filament';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
