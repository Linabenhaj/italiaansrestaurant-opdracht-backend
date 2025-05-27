<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_log_in_with_correct_credentials(): void
    {
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

        $user = User::factory()->create([
            'email' => 'user@example.com',
            'password' => Hash::make('Password!321'),
        ]);

        $response = $this->post('/login', [
            'email' => 'user@example.com',
            'password' => 'Password!321',
            '_token' => csrf_token(),
        ]);

        $response->assertRedirect('/');
        $this->assertAuthenticatedAs($user);
    }
}