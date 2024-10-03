<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|unique:websites,url',
        ]);

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
