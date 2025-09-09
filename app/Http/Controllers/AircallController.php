<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AircallController extends Controller
{
    private string $base;
    private string $id;
    private string $token;

    public function __construct()
    {
        $this->base  = rtrim(env('AIRCALL_API_BASE', 'https://api.aircall.io/v1'), '/');
        $this->id    = env('AIRCALL_API_ID');
        $this->token = env('AIRCALL_API_TOKEN');
    }

    
     # Cliente HTTP
     
    private function client()
    {
        return Http::withBasicAuth($this->id, $this->token)
            ->acceptJson()
            ->withOptions(['force_ip_resolve' => 'v4']) 
            ->connectTimeout(10)
            ->timeout(20);
    }

    
      # Proxy 
    private function proxy(string $path, array $query = [])
    {
        try {
            $res = $this->client()->get($this->base . $path, $query);

            return response()->json($res->json(), $res->status());
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 500,
                'error'  => $e->getMessage(),
            ], 500);
        }
    }

    
     # Lista de usuarios
     
    public function users(Request $request)
    {
        $page     = (int) $request->query('page', 1);
        $per_page = (int) $request->query('per_page', 5);

        return $this->proxy('/users', compact('page', 'per_page'));
    }

    
     # Lista de llamadas
    
    public function calls(Request $request)
    {
        $page     = (int) $request->query('page', 1);
        $per_page = (int) $request->query('per_page', 10);

        return $this->proxy('/calls', compact('page', 'per_page'));
    }

    #Lista de contactos
    public function contacts(Request $request)
    {
        $page     = (int) $request->query('page', 1);
        $per_page = (int) $request->query('per_page', 5);

        return $this->proxy('/contacts', compact('page', 'per_page'));
    }

#Lista de numeros
    public function numbers(Request $request)
    {
        $page     = (int) $request->query('page', 1);
        $per_page = (int) $request->query('per_page', 5);

        return $this->proxy('/numbers', compact('page', 'per_page'));
    }
#Lista de equipos
    public function teams(Request $request)
    {
        $page     = (int) $request->query('page', 1);
        $per_page = (int) $request->query('per_page', 5);

        return $this->proxy('/teams', compact('page', 'per_page'));
    }
#Lista de etiquetas
    public function tags(Request $request)
    {
        $page     = (int) $request->query('page', 1);
        $per_page = (int) $request->query('per_page', 5);

        return $this->proxy('/tags', compact('page', 'per_page'));
    }
#Lista de compañia
      public function company(Request $request)
    {
        $page     = (int) $request->query('page', 1);
        $per_page = (int) $request->query('per_page', 5);

        return $this->proxy('/company', compact('page', 'per_page'));
    }
}
