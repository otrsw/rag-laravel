<?php

namespace Ontherocksoftware\RagLaravel\Commands;

use Illuminate\Console\Command;

class RagLaravelCommand extends Command
{
    public $signature = 'rag-laravel';

    public $description = 'My command';

    public function handle()
    {
        $echo = config('rag-laravel.command_output_text');
        $this->comment("RAG Package");
        $this->comment($echo);
    }
}
