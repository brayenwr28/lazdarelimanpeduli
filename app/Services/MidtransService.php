<?php

namespace App\Services;

use App\Models\Donation;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class MidtransService
{
    protected $serverKey;
    protected $clientKey;
    protected $snapUrl;
    protected $isProduction;

    public function __construct()
    {
        $this->serverKey = config('midtrans.server_key');
        $this->clientKey = config('midtrans.client_key');
        $this->snapUrl = config('midtrans.snap_url');
        $this->isProduction = config('midtrans.is_production');
    }

    /**
     * Create Snap transaction for donation
     */
    public function createSnapTransaction(Donation $donation)
    {
        $grossAmount = (int) $donation->amount;
        
        $payload = [
            'transaction_details' => [
                'order_id' => $donation->transaction_id,
                'gross_amount' => $grossAmount,
            ],
            'customer_details' => [
                'first_name' => $donation->donor_name,
                'email' => $donation->donor_email,
                'phone' => $donation->donor_phone,
            ],
            'item_details' => [
                [
                    'id' => 'donation-' . $donation->id,
                    'price' => $grossAmount,
                    'quantity' => 1,
                    'name' => 'Donasi ' . ucfirst($donation->donation_type) . ' - ' . $donation->program,
                ]
            ],
            'callbacks' => [
                'finish' => route('donation.finish'),
                'error' => route('donation.error'),
                'pending' => route('donation.pending'),
            ],
        ];

        try {
            $response = Http::withBasicAuth($this->serverKey, '')
                ->post($this->snapUrl, $payload);

            if ($response->successful()) {
                $data = $response->json();
                
                // Update donation with token
                if (isset($data['token'])) {
                    $donation->update([
                        'midtrans_response' => json_encode($data)
                    ]);
                    return $data;
                }
            }
            
            return null;
        } catch (\Exception $e) {
            \Log::error('Midtrans Error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Check transaction status
     */
    public function checkStatus($transactionId)
    {
        try {
            $url = config('midtrans.is_production', false)
                ? "https://app.midtrans.com/api/v1/transactions/{$transactionId}/status"
                : "https://app.sandbox.midtrans.com/api/v1/transactions/{$transactionId}/status";

            $response = Http::withBasicAuth($this->serverKey, '')
                ->get($url);

            return $response->json();
        } catch (\Exception $e) {
            \Log::error('Midtrans Status Check Error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Generate unique transaction ID
     */
    public static function generateTransactionId()
    {
        return 'DARELIMAN-' . date('YmdHis') . '-' . Str::random(6);
    }
}
