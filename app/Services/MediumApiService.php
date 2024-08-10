<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class MediumService
{
    protected $baseUrl = 'https://api.medium.com';
    protected $accessToken;

    public function __construct($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    public function getPublications()
    {
        $response = Http::withToken($this->accessToken)
        ->get("https://blog.medium.com/");

        return $response->json();
    }

    public function getPosts($publicationId)
    {
        $response = Http::withToken($this->accessToken)
                        ->get("https://blog.medium.com/");

        return $response->json();
    }
}
