<?php

namespace Tests\Feature;

use App\Models\LogAggregator;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class LogAggregatorAPIControllerTest
 *
 * @package Tests\Feature
 */
class LogAggregatorAPIControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Testing that non-authenticated users can't create a Log entry
     *
     * @return void
     */
    public function testNonAuthenticatedUserCreate()
    {
        $log = 'Test log';

        $response = $this->postJson('/api/logs', [
            'log' => $log
        ]);

        $response->assertStatus(401);

        $this->assertEquals(0, LogAggregator::where('log', $log)->count());
    }

    /**
     * Testing that authenticated users can create a Log entry
     *
     * @return void
     */
    public function testAuthenticatedUserCreate()
    {
        $user = User::factory()->make();

        $log = 'Test log';

        $response = $this->actingAs($user)->postJson('/api/logs', [
            'log' => $log
        ]);

        $response->assertStatus(200);

        $this->assertEquals(1, LogAggregator::where('log', $log)->count());
    }
}
