<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\File;
use App\Services\Article\StoreArticleService;
use App\Services\Generator\GenerateContentService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function generateArticle(
    File $file,
    $keyword,
    StoreArticleService $storeArticleService,
    GenerateContentService $generateContentService
    )
    {
        $kword = $file->find($keyword);
        if(empty($kword->url)) {
            return dd('error');
        }
        $new_keyword = 'write a paragraph about '.$kword->keyword;
        $generatedArticle = $generateContentService->execute($new_keyword);
        $data = $storeArticleService->execute($kword,$generatedArticle);

        return redirect()->back()->with('message','Successfully generated.');

    }
    public function destroy($keyword)
    {
        dd($keyword);
    }
}
