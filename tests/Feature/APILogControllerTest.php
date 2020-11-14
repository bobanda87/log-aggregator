<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class AuthenticationTest
 *
 * @package Tests\Feature
 */
class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Testing that non-authenticated users can't access home route
     *
     * @return void
     */
    public function testNonAuthenticatedUser()
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }

    /**
     * Testing that authenticated users can access home route
     *
     * @return void
     */
    public function testAuthenticatedUser()
    {
        $user = User::factory()->make();

        $response = $this->actingAs($user)->get('/');

        $response->assertStatus(200);
    }
}
