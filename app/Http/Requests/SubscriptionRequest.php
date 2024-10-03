<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscriptionRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:subscriptions,email,NULL,id,website_id,' . $this->route('website'),
        ];
    }
}
