<?php

namespace App\Listeners;

use App\Events\NewBookSubscribed;
use Illuminate\Support\Facades\Http;

class SendSlackNotification
{
    public function handle(NewBookSubscribed $event)
    {
        $webhookUrl = config('services.slack.webhook_url');

        $message = [
            'text' => "New book subscription: {$event->bookTitle}",
            'blocks' => [
                [
                    'type' => 'section',
                    'text' => [
                        'type' => 'mrkdwn',
                        'text' => "*New Book Subscription!* :book:"
                    ]
                ],
                [
                    'type' => 'section',
                    'fields' => [
                        [
                            'type' => 'mrkdwn',
                            'text' => "*Book:*\n{$event->bookTitle}"
                        ],
                        [
                            'type' => 'mrkdwn',
                            'text' => "*Subscriber:*\n{$event->subscriberName}"
                        ]
                    ]
                ]
            ]
        ];

        Http::post($webhookUrl, $message);
    }
}
