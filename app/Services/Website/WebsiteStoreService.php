<?php

namespace App\Services\Website;

use App\Models\Website;
use Illuminate\Support\Str;

class WebsiteStoreService {

    public function execute($params,$id)
    {
        $params['slug'] = Str::slug($params['url']);
        $website = Website::create([
            'url' => $params['url'],
            'slug' => $params['slug'],
            'token' => Str::random(32),
            'user_id' => $id,
        ]);
        return $website;
    }
}
