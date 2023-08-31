<?php

namespace App\Services\Generator;

use OpenAI;


class GenerateContentService {

    public function execute($content)
    {
        $client = OpenAI::client(env('OPENAI_API_KEY'));
        $result = $client->completions()->create([
            "model" => "text-davinci-003",
            "temperature" => 0.7,
            "top_p" => 1,
            "frequency_penalty" => 0,
            "presence_penalty" => 0,
            'max_tokens' => 600,
            'prompt' => $content,
        ]);
        $content = trim($result['choices'][0]['text']);

        return $content;
    }
}
