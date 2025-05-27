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

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_form_submission_saves_message(): void
    {
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

        $response = $this->post('/contact', [
            'name' => 'Gebruiker Test',
            'email' => 'gebruiker@test.com',
            'subject' => 'Testvraag',
            'message' => 'Wanneer zijn jullie open?',
            '_token' => csrf_token(),
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('contact_messages', [
            'email' => 'gebruiker@test.com',
            'subject' => 'Testvraag',
        ]);
    }
}
