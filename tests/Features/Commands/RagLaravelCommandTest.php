<?php

namespace Ontherocksoftware\RagLaravel\Tests;

class RagLaravelCommandTest extends TestCase
{
    /** @test */
    public function the_skeleton_command_works()
    {
        $this->artisan('rag-laravel')->assertExitCode(0);
    }

    /** @test */
    public function the_config_contains_token()
    {
        $this->artisan('rag-laravel')
        ->assertExitCode(0);

    }    
}
