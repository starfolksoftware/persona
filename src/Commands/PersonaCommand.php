<?php

namespace StarfolkSoftware\Persona\Commands;

use Illuminate\Console\Command;

class PersonaCommand extends Command
{
    public $signature = 'persona';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
