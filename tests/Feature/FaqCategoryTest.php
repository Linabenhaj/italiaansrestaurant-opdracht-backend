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

class FaqCategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_faq_category(): void
    {
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

        $admin = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($admin)->post('/admin/faq-categories', [
            'name' => 'Betalen & Levering',
            '_token' => csrf_token(),
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('faq_categories', ['name' => 'Betalen & Levering']);
    }
}
