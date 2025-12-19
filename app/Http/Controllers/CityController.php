<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\City;
use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Request;

class CityController extends Controller
{
    public function index($provinceId)
    {
        $city = City::where('province_id', $provinceId)->get();
        return response()->json([
            'status' => 'get city by province ok',
            'data' => $city
        ], 200);
    }

//     public function store()
//     {
//         $client = new Client();

//         $provinces = Province::all();

//         foreach ($provinces as $province) {

//             $response = $client->get(
//                 "https://rajaongkir.komerce.id/api/v1/destination/city/{$province->id}",
//                 [
//                     'headers' => [
//                         'accept' => 'application/json',
//                         'key' => env('RAJAONGKIR_KEY'),
//                     ],
//                 ]
//             );

//             $result = json_decode($response->getBody(), true);

//             if (!isset($result['data'])) {
//                 continue;
//             }

//             foreach ($result['data'] as $city) {
//                 City::updateOrCreate(
//                     ['id' => $city['id']],
//                     [
//                         'province_id' => $province->id,
//                         'name' => $city['name'],
//                     ]
//                 );
//             }
//         }

//         return response()->json([
//             'message' => 'City berhasil disimpan',
//             'total_province' => $provinces->count(),
//         ]);
//     }
}

