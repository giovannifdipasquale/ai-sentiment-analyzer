<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;
use LucianoTonet\GroqLaravel\Facades\Groq;

/*
 * Livewire component to take a user prompt and return a response from the
 * Groq AI model.
 */

class ChatApi extends Component
{
    #[Validate('required', 'string')]
    public $prompt;
    public $messages = [];

    /*
     * Send user input to the Groq AI model and store the response.
     */
    public function sendPrompt()
    {
        $this->validate();
        $this->messages[] = [
            'role' => 'user',
            'content' => $this->prompt,
        ];

        $response = Groq::chat()->completions()->create([
            'model' => 'llama-3.1-8b-instant',  // Check available models at console.groq.com/docs/models
            'messages' => $this->messages,
        ]);

        $this->messages[] = [
            'role' => 'assistant',
            'content' => $response['choices'][0]['message']['content'],
        ];
    }

    /*
     * Return the view for the component, including the response.
     */
    public function render()
    {
        return view('livewire.chat-api');
    }
}
