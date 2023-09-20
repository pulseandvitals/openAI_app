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
        return redirect()
            ->back()
            ->with('message','Successfully generated.');

    }
    public function show($keyword)
    {
        $article = File::find($keyword);
        $prompt = Article::select(['article','id','created_at'])
            ->where('topical_map_id', $article->id)
            ->first();

        return Inertia::render('Document/Article/Show', [
            'article' => $article,
            'related_info' => $article->main_topic_1. ',' .$article->sub_topic_2. ',' . $article->sub_topic_3,
            'prompt' => [
                'id' => $prompt->id ?? null,
                'response' => $prompt->article ?? null,
                'created' => !empty($prompt->created_at) ? $prompt->created_at->format('M, d Y H:i:s A') : null,
            ],
        ]);
    }

    public function generateSingleArticle(
    Request $request,
    File $article,
    GenerateContentService $generateContentService,
    StoreArticleService $storeArticleService
    )
    {
        $question = 'write me an article with title "'. $request->keyword .
        '" and here are my additional details to help you prompt more specifically "' . $request->additional_info .
        '" with "' . $request->outline_format . '" format in outline and please make it "' . $request->options. '"';

        $generatedPrompt = $generateContentService->execute($question);
        $storeArticleService->execute($article,$generatedPrompt);

        return redirect()
            ->back()
            ->with('message','Successfully generated an article.');
    }

    public function submitArticle(Request $request, $article)
    {
        Article::find($article)->update([
            'is_completed' => 1,
            'article' => $request->prompt
        ]);

        return redirect()
            ->back()
            ->with('message','Successfully submitted an article.');
    }

    public function destroy($prompt)
    {
        Article::find($prompt)->delete();

        return redirect()
            ->back()
            ->with('message','Successfully deleted an article.');
    }
}
