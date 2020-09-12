<?php

namespace Tests\Feature\Models;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_should_have_valid_avatar_image(): void
    {
        $user = User::factory()->create();
        $this->assertTrue(getimagesize($user->profile_photo_url) > 0, 'Valid Profile Photo');
    }
}
