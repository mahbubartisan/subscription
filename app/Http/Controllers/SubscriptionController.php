<?php

namespace App\Http\Controllers;

use App\Models\Website;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request, $website_id) {
        $request->validate([
            'email' => 'required|email|unique:subscriptions,email,NULL,id,website_id,' . $website_id,
        ]);

        $website = Website::findOrFail($website_id);

        Subscription::create([
            'email' => $request->email,
            'website_id' => $website->id,
        ]);

        return response()->json(['message' => 'Subscription successful!'], 201);
    }
}
