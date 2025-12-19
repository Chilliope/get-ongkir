<?php

namespace App\Http\Controllers;

use App\Models\Province;
use GuzzleHttp\Client;

class ProvinceController extends Controller
{
    public function index()
    {
        $province = Province::get();

        return response()->json([
            'status' => 'get provinces ok',
            'data' => $province
        ], 200);
    }

    // public function store()
    // {
    //     $client = new Client();

    //     $response = $client->get('https://rajaongkir.komerce.id/api/v1/destination/province', [
    //         'headers' => [
    //             'accept' => 'application/json',
    //             'key' => env('RAJAONGKIR_KEY'),
    //         ],
    //     ]);

    //     $result = json_decode($response->getBody(), true);

    //     foreach ($result['data'] as $province) {
    //         Province::updateOrCreate(
    //             ['id' => $province['id']],
    //             ['name' => $province['name']]
    //         );
    //     }

    //     return response()->json([
    //         'message' => 'Province saved to your database',
    //         'total' => count($result['data'])
    //     ]);
    // }
}

