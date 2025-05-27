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
class AdminNewsTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_news_item()
    {
        // ⛔ Zet CSRF-middleware uit voor deze test
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

        // 🛠️ Maak een admin-gebruiker aan
        $admin = User::factory()->create([
            'is_admin' => true,
        ]);

        // 🔐 Voer de actie uit als admin
        $response = $this->actingAs($admin)->post('/admin/news', [
            'title'            => 'Test Nieuws',
            'content'          => 'Dit is een testnieuwsitem.',
            'publication_date' => now()->format('Y-m-d'),
        ]);

        // ✅ Controleer de redirect en database
        $response->assertRedirect();
        $this->assertDatabaseHas('news_items', [
            'title' => 'Test Nieuws',
        ]);
    }
}
