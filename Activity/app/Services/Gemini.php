<?php

namespace App\Services;

use GuzzleHttp\Client;

class Gemini
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('OPENAI_API_KEY');
    }

    public function getRecommendations($userHistory)
    {
        $url = 'https://api.openai.com/v1/chat/completions';

        // Kullanıcının okuduğu blogların geçmişi
        $prompt = "Aşağıda bir kullanıcının okuduğu blog başlıkları listelenmiştir.
                   Kullanıcı için uygun başka blog önerileri sun:
                   \n\nUser Blog History: " . implode(", ", $userHistory);

        $response = $this->client->post($url, [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'model' => 'GPT-3.5 Turbo',
                'messages' => [
                    ['role' => 'system', 'content' => 'You are a helpful assistant.'],
                    ['role' => 'user', 'content' => $prompt],
                ],
                'max_tokens' => 10,
            ],
        ]);

        $responseData = json_decode($response->getBody(), true);
        return $responseData['choices'][0]['message']['content'] ?? 'No recommendations found.';
    }
}
