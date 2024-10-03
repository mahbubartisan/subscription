<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\Subscription;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmailsToSubscribers extends Command
{
    protected $signature = 'send:emails';
    protected $description = 'Send emails to subscribers for new posts';

    public function handle()
    {
        $posts = Post::where('email_sent', false)->get();

        foreach ($posts as $post) {
            $subscribers = Subscription::where('website_id', $post->website_id)->get();

            foreach ($subscribers as $subscriber) {
                Mail::to($subscriber->email)
                    ->queue(new \App\Mail\NewPostNotification($post));
            }

            $post->update(['email_sent' => true]);
        }

        $this->info('Emails sent successfully!');
    }
}
