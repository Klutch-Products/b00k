<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

/**
 *
 */
class SubscriptionConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */


    public $user;
    /**
     * @var
     */
    public $publisher;
    /**
     * @var
     */
    public $subscriptionCode;

    /**
     * @param $user
     * @param $publisher
     * @param $subscriptionCode
     */
    public function __construct($user, $publisher, $subscriptionCode)
    {
        //
        $this->user = $user;
        $this->publisher = $publisher;
        $this->subscriptionCode = $subscriptionCode;

    }

    /**
     * @return SubscriptionConfirmation
     */
    public function build(): SubscriptionConfirmation
    {
        return $this->view('emails.subscription_confirmation')->subject('Subscription Confirmation');
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(

            subject: 'Subscription Confirmation',
        );
    }

    /**
     * Get the message content definition.
     */

    public function content(): Content
    {
        return new Content(
            html: 'mail.subscription-confirmation',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */

//TODO: we need to be able to download PDF or WordDocs


    /**
     * @return array
     */
    public function attachments(): array
    {
        return [];
    }
}
