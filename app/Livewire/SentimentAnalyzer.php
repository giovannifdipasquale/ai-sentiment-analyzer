<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SentimentAnalyzer extends Component
{
    public $input = '';
    public $sentiment = '';
    private $model;
    // loading indicator
    public function __construct()
    {
        $this->model = 'tabularisai/multilingual-sentiment-analysis';
    }

    public function analyzeSentiment()
    {
        if (empty(trim($this->input))) {
            $this->sentiment = 'Invalid input! Please enter some text.';
            return;
        }
        // setting the loading indicator to true until we receive a response

        try {
            $apiKey = env('HUGGINGFACE_API_KEY');
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ])->post("https://api-inference.huggingface.co/models/{$this->model}", [
                'inputs' => $this->input,
            ]);

            $data = $response->json();

            if (isset($data[0][0]['label'])) {
                $this->sentiment = $this->getSentimentBadge($data[0][0]['label']);
            } else {
                $this->sentiment = 'Error processing response.';
            }
        } catch (\Exception $e) {
            $this->sentiment = 'API error. Please try again later.';
        }
        // setting the loading indicator to false after we received a response

    }
    private function getSentimentBadge($sentiment)
    {
        $badges = [
            'Very Negative' => '<span class="badge bg-danger">😡 Very Negative</span>',
            'Negative' => '<span class="badge bg-warning text-dark">🙁 Negative</span>',
            'Neutral' => '<span class="badge bg-secondary">😐 Neutral</span>',
            'Positive' => '<span class="badge bg-success">😊 Positive</span>',
            'Very Positive' => '<span class="badge bg-primary">🤩 Very Positive</span>',
        ];
        return $badges[$sentiment] ?? 'Unknown sentiment';
    }
    public function render()
    {

        return view('livewire.sentiment-analyzer');
    }
}