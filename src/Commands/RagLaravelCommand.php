<?php

namespace Ontherocksoftware\RagLaravel\Commands;

use Illuminate\Console\Command;

class RagLaravelCommand extends Command
{
    public $signature = 'rag-laravel';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
