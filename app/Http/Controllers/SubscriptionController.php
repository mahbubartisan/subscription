<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequest;
use App\Models\Subscription;
use App\Models\Website;

class SubscriptionController extends Controller
{
    public function subscribe(SubscriptionRequest $request, $website_id)
    {
        $website = Website::findOrFail($website_id);

        $subscription = Subscription::where('email', $request->email)
            ->where('website_id', $website->id)
            ->first();
            
        if ($subscription) {
            return response()->json(['message' => 'Email is already subscribed to this website.'], 409);
        }

        Subscription::create([
            'email' => $request->email,
            'website_id' => $website->id,
        ]);

        return response()->json(['message' => 'Subscription successful!'], 201);
    }
}
