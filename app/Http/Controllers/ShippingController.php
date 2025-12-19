<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\ShippingCost;
use Carbon\Carbon;

class ShippingController extends Controller
{
    public function calculateCost(Request $request)
    {
        $origin = 201; // Denpasar
        $destination = $request->destination;
        $weight = $request->weight ?? 1000;
        $courier = $request->courier ?? 'jne';

        // 1️⃣ cek database dulu dan expired
        $cached = ShippingCost::where([
            'origin' => $origin,
            'destination' => $destination,
            'weight' => $weight,
            'courier' => $courier
        ])->where('expired_at', '>', Carbon::now())
          ->first();

        if ($cached) {
            // kalau ada dan belum expired, kembalikan dari database
            return response()->json($cached->data);
        }

        // 2️⃣ kalau tidak ada atau expired, panggil API
        $client = new Client();
        $response = $client->post('https://rajaongkir.komerce.id/api/v1/calculate/district/domestic-cost', [
            'headers' => [
                'accept' => 'application/json',
                'key' => env('RAJAONGKIR_KEY'),
                'Content-Type' => 'application/x-www-form-urlencoded',
            ],
            'form_params' => [
                'origin' => $origin,
                'destination' => $destination,
                'weight' => $weight,
                'courier' => $courier,
            ]
        ]);

        $data = json_decode($response->getBody(), true);

        // 3️⃣ simpan / update ke database dengan expired_at 7 hari
        ShippingCost::updateOrCreate(
            [
                'origin' => $origin,
                'destination' => $destination,
                'weight' => $weight,
                'courier' => $courier
            ],
            [
                'data' => $data,
                'expired_at' => Carbon::now()->addDays(7)
            ]
        );

        // 4️⃣ kembalikan response ke user
        return response()->json($data);
    }
}
