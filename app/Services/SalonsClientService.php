<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SalonsClientService
{
    private string $url = 'https://fake-data3.p.rapidapi.com/fk/companies';

    public function __construct(
        private string $apiHost,
        private string $apiKey
    ) {}

    public function getSalons()
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'X-RapidAPI-Host' => $this->apiHost,
            'X-RapidAPI-Key' => $this->apiKey,
        ])->get($this->url);

        if ($response->failed()) {
            $response->throw();
        }

        return $response->collect('data');
    }
}