<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequest;
use App\Models\Website;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function subscribe(SubscriptionRequest $request, $website_id) {
       
        $website = Website::findOrFail($website_id);

        Subscription::create([
            'email' => $request->email,
            'website_id' => $website->id,
        ]);

        return response()->json(['message' => 'Subscription successful!'], 201);
    }
}
