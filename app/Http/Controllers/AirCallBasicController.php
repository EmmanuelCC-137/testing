<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class AircallBasicController extends Controller
{
    public function test()
    {
        $base  = rtrim(env('AIRCALL_API_BASE', 'https://api.aircall.io/v1'), '/');
        $id    = env('AIRCALL_API_ID');
        $token = env('AIRCALL_API_TOKEN');

        try {
            $res = Http::withBasicAuth($id, $token)
                ->acceptJson()
                ->withOptions(['force_ip_resolve' => 'v4']) 
                ->connectTimeout(10)
                ->timeout(20)
                ->get($base . '/users', ['per_page' => 1]); 

            return response()->json([
                'status'  => $res->status(),
                'ok'      => $res->ok(),
                'json'    => $res->json(),
                'url'     => $base . '/users?per_page=1',
            ], $res->status());
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 500,
                'error'  => $e->getMessage(),
            ], 500);
        }
    }
}
