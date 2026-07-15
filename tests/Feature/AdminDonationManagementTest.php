<?php

namespace Tests\Feature;

use App\Models\Donation;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminDonationManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_delete_a_donation(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        $donation = Donation::create([
            'program_id' => null,
            'donation_code' => 'DON-TEST-001',
            'donor_name' => 'Test Donatur',
            'donor_phone' => '081234567890',
            'donor_email' => 'donatur@example.com',
            'campaign_category' => 'sedekah',
            'amount' => 50000,
            'payment_method' => 'transfer',
            'status' => 'pending',
        ]);

        $response = $this->actingAs($admin)
            ->delete(route('admin.donations.destroy', $donation));

        $response->assertRedirect(route('admin.donations.index'))
            ->assertSessionHas('success', 'Donasi berhasil dihapus.');

        $this->assertDatabaseMissing('donations', ['id' => $donation->id]);
    }
}
