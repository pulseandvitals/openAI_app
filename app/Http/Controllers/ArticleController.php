<?php

namespace App\Http\Controllers;

use App\Models\File;
use Inertia\Inertia;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Services\Article\StoreArticleService;
use App\Services\Generator\GenerateContentService;

class ArticleController extends Controller
{
    public function generateArticle(
    File $file,
    $keywords,
    StoreArticleService $storeArticleService,
    GenerateContentService $generateContentService
    )
    {
        $keywords = explode(",", $keywords);

        foreach($keywords as $keyword) {
            $kword = $file->find($keyword);
            if(empty($kword->url)) {
                return dd('error');
            }
            $new_keyword = 'write a paragraph about '.$kword->keyword;
            $generatedArticle = $generateContentService->execute($new_keyword);
            $storeArticleService->execute($kword,$generatedArticle);
        }
        return redirect()->back()->with('message','Successfully generated.');

    }
    public function show($keyword)
    {
        $article = File::find($keyword);
        return Inertia::render('Document/Article/Show', [
            'article' => $article
        ]);
    }
}
