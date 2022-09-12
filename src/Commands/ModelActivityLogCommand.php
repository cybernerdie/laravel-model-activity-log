<?php

namespace Cybernerdie\ModelActivityLog\Commands;

use Illuminate\Console\Command;

class ModelActivityLogCommand extends Command
{
    public $signature = 'laravel-model-activity-log';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
