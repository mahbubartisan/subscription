<?php

namespace App\Http\Controllers;

use App\Http\Requests\WebsiteRequest;
use App\Models\Website;


class WebsiteController extends Controller
{
    public function store(WebsiteRequest $request)
    {
        
        $website = Website::create([
            'name' => $request->name,
            'url' => $request->url,
        ]);

        return response()->json([
            'message' => 'Website created successfully!',
            'website' => $website,
        ], 201);
    }

    public function index()
    {
        $websites = Website::all();
        return response()->json($websites);
    }
}
