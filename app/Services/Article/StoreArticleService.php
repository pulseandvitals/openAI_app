<?php

namespace App\Services\Article;

use App\Models\File;
use App\Models\Article;
use Illuminate\Support\Str;

class StoreArticleService {

    public function execute($params,$article)
    {
        $article = Article::create([
            'user_id' => $params['user_id'],
            'document_id' => $params['document_id'],
            'topical_map_id' => $params['id'],
            'web_url' => $params['url'],
            'article' => $article,
            'token' => Str::random(32),
        ]);

        $file = File::find($params['id']);
        $file->update([
            'is_completed' => 1
        ]);

        return $article;
    }
}
