<?php

namespace TLabsCo\ArrayMacros\Commands;

use Illuminate\Console\Command;

class ArrayMacrosCommand extends Command
{
    public $signature = 'laravel-array-macros';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
