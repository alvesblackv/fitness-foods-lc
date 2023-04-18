<?php

namespace Tests\Feature\System;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowSystemInfoTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_endpoint_is_ok_to_access(): void
    {
        $response = $this->get(route('show-api-status'),
            ['x-api-token' => config('services.auth.api_token')]);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'is_writing_and_reading',
            'last_execute_cron',
            'uptime_online',
            'memory_usage'
        ]);
    }
}
