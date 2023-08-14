<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Website;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\WebsiteRequest;
use App\Http\Resources\WebsiteResource;
use App\Services\Website\WebsiteStoreService;

class WebsiteController extends Controller
{

    public function index()
    {
        return Inertia::render('Website/Index', [
            'websites' => WebsiteResource::collection(
                Website::query()
                ->where('user_id',auth()->id())
                ->get()
                )
        ]);
    }

    public function create()
    {
        return Inertia::render('Website/Create');
    }

    public function store(WebsiteRequest $request,WebsiteStoreService $website)
    {
        $website->execute(
            $request->validated(),
            auth()->id()
        );
        return redirect()->route('website.index')->with('message','Success');
    }

    public function show(Website $website)
    {
        //
    }

    public function edit(Website $website)
    {
        return Inertia::render('Website/Edit', [
            'website' => $website,
        ]);
    }

    public function update(WebsiteRequest $request, Website $website)
    {
        $website->slug = Str::slug($request->url);
        $website->update($request->only(
            'url',
            'slug'
        ));

        return redirect()->route('website.index')->with('message','Success');
    }

    public function destroy(Website $website)
    {
        $website->delete();

        return redirect()->route('website.index')->with('message','Success');
    }
}
