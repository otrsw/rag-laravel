<?php

namespace Ontherocksoftware\RagLaravel\Tests;

use Illuminate\Support\Arr;
use Ontherocksoftware\RagLaravel\Exceptions\RagException;
use Ontherocksoftware\RagLaravel\RagLaravel;

class MonitorInterfaceTest extends TestCase
{
    const TEST_TOKEN = 'H2X6mP42Vy7BO4fyY7qiSOOiqE1aYh9cpxglO0sT';

    public function can_list_monitors()
    {
        config()->set('rag-laravel.token', static::TEST_TOKEN);
        $monitors = RagLaravel::monitors();
        ray($monitors);
        $this->assertEquals(Arr::get($monitors, 'current_page', -1), 1);
    }

    /** @test */
    public function can_set_existing_monitor_red()
    {
        config()->set('rag-laravel.token', static::TEST_TOKEN);
        $name = 'Test';
        $url = 'https://www.google.com/search?q=red';
        $message = 'Updated from test '. now() .' case testing status should be green';
        $monitor = [];

        try {
            $monitor = RagLaravel::red($name, $message, $url);
        } catch (RagException $rag) {
            $error = $rag->getMessage();
            ray($rag);
            ray("RAG Error message is " . $error);
        }

        ray($monitor);
        $this->assertEquals(Arr::get($monitor, 'status', 'unknown'), 'red');
    }

    /** @test */
    public function can_set_existing_monitor_green()
    {
        config()->set('rag-laravel.token', static::TEST_TOKEN);
        $name = 'Test';
        $url = 'https://www.google.com/search?q=green';
        $message = 'Updated from test '. now() .' case testing status should be green';
        $monitor = [];

        try {
            $monitor = RagLaravel::green($name, $message, $url);
        } catch (RagException $rag) {
            $error = $rag->getMessage();
            ray($rag);
            ray("RAG Error message is " . $error);
        }

        ray($monitor);
        $this->assertEquals(Arr::get($monitor, 'status', 'unknown'), 'green');
    }

    /** @test */
    public function can_set_existing_monitor_amber()
    {
        config()->set('rag-laravel.token', static::TEST_TOKEN);
        $name = 'Test';
        $url = 'https://www.google.com/search?q=amber';
        $message = 'Updated from test '. now() .' case testing status should be green';
        $monitor = [];

        try {
            $monitor = RagLaravel::amber($name, $message, $url);
        } catch (RagException $rag) {
            $error = $rag->getMessage();
            ray($rag);
            ray("RAG Error message is " . $error);
        }

        ray($monitor);
        $this->assertEquals(Arr::get($monitor, 'status', 'unknown'), 'amber');
    }

    public function does_authenticate_token()
    {
        config()->set('rag-laravel.token', 'notthemomma');

        try {
            $monitors = RagLaravel::monitors();
            ray($monitors);
        } catch (RagException $rag) {
            $error = $rag->getMessage();
            ray($error);
        }
        
        $this->assertEquals($error, 'Unauthenticated.');
    }
}
